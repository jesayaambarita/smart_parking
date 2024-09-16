//include library
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Servo.h>
//#include <LiquidCrystal_I2C.h>

//network ssid dan password
//const char* ssid = "Jesaya Sohasuhatan Ambarita";
//const char* password = "123sampe100";
const char* ssid = "tselhome_1451";
const char* password = "naaqn32y3Ft";

//deklarasi rfid
#define SS_PIN D2  //--> SDA / SS is connected to pinout D2
#define RST_PIN D1  //--> RST is connected to pinout D1
#define SS_PIN_DUA D4 //--> RST is connected to pin S3

#define JML_READER 2

#define ON_Board_LED 2  //--> Defining an On Board LED, used for indicators when the process of connecting to a wifi router
//array yang menampung pin SDA
//byte SDA_PIN[] = {SS_PIN, SS_PIN_DUA};

//deklarasi lcd
//#define SDA_PIN D1
//#define SCL_PIN D2

//definisi servo
#define pin_servo D0 // pin D0 = GPIO 16

//definisi ir_masuk
#define pin_ir_masuk D4
#define pin_ir_car1 D8

//definisi button keluar
//#define BUTTON_PIN D3

//definisi servo Keluar
#define pin_servo_keluar D3// pin D3 nodemcu

//#define BUTTON_PIN D8
//int buttonState = 0;  // Variabel untuk menyimpan status tombol

//objek servo
Servo gateServo;
Servo gateServoKeluar;

//MFRC522 INIT
MFRC522 mfrc522(SS_PIN, RST_PIN);  //--> Create MFRC522 instance..
MFRC522 mfrcKeluar522(SS_PIN_DUA, RST_PIN);

//Ip Server
//const char* host = "192.168.100.222";
const char* host = "192.168.8.151";
ESP8266WebServer server(80);  //--> Server on port 80

// Inisialisasi objek LCD
//LiquidCrystal_I2C lcd(0x27, 20, 4);

byte readcard[4];
char str[32] = "";
String StrUID;
int val = 0;


void setup() {
  Serial.begin(115200);
  SPI.begin();
  mfrc522.PCD_Init();
  mfrcKeluar522.PCD_Init();
  //  for (int reader = 0; reader < JML_READER; reader++) {
  //    mfrc522[reader].PCD_Init(SDA_PIN[reader], RST_PIN);
  //    Serial.print("Reader : " + String(reader));
  //    Serial.print(": ");
  //    mfrc522[reader].PCD_DumpVersionToSerial();
  //  }
  WiFi.begin(ssid, password);
  pinMode(ON_Board_LED,OUTPUT); 
  digitalWrite(ON_Board_LED, HIGH); //--> Turn off Led On Board
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
     digitalWrite(ON_Board_LED, LOW);
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
  }
   
  Serial.println("");
  Serial.print("Succesfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  server.begin();

  //setup pin servo
  gateServo.attach(pin_servo);
  gateServo.write(0);

  //setup pin ir
  //  pinMode(pin_ir_masuk, INPUT);
  pinMode(pin_ir_car1, INPUT);

  //setup button pin
  //   pinMode(BUTTON_PIN, INPUT);

  //setup pin servo keluar
  gateServoKeluar.attach(pin_servo_keluar);
  gateServoKeluar.write(0);

//  pinMode(BUTTON_PIN.INPUT);

  // Inisialisasi LCD
  //   lcd.init();
  //  lcd.backlight();
  //
  //  // Tampilkan pesan awal di LCD
  //  lcd.print("SELAMAT DATANG DI UNIKA...");
}

void loop() {

  /*BUKA GERBANG MASUK MENGGUNAKAN RFID*/
  if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
    //      String IDTAG = "";
    /*CONVERT BYTE DARI ANGKA ACAK MENJADI HEX*/
    for (byte i = 0; i < mfrc522.uid.size; i++) {
      //        IDTAG += mfrc522[reader].uid.uidByte[i];
      readcard[i] = mfrc522.uid.uidByte[i]; //storing the UID of the tag in readcard
      array_to_string(readcard, 4, str);
      StrUID = str;
    }
    //      Serial.println("Reader " + String(reader));

    //kirim uid kartu rfid untuk disimpan ke text input
    WiFiClient client;
    const int httpPort = 80;
    if (!client.connect(host, httpPort)) {
      Serial.println("Connection Failed");
      return;
    }

    String Link;
    HTTPClient http;
//    Link = "http://192.168.100.222/parking/rest.php?uid=" + StrUID;
    Link = "http://192.168.8.151/parking/rest.php?uid=" + StrUID;
    http.begin(client, Link);

    int httpCode = http.GET();
    String payload = http.getString();
    Serial.println(payload);
    Serial.println(StrUID);
    delay(200);
    http.end();

    //baca status servo
    String linkServo;
    HTTPClient httpServo;
//    linkServo = "http://192.168.100.222/parking/openGate.php?uid=" + StrUID;
    linkServo = "http://192.168.8.151/parking/openGate.php?uid=" + StrUID;
    httpServo.begin(client, linkServo);
    int httpServoCode = httpServo.GET();
    //baca status response
    String responseServo = httpServo.getString();
    digitalWrite(ON_Board_LED, HIGH);
    Serial.println(responseServo);
    httpServo.end();

    //set Posisi Servo
    gateServo.write(responseServo.toInt());
    //    moveServoSmoothly(0, responseServo.toInt(), 5);  // Memindahkan servo dari 0 derajat ke 180 derajat dengan kecepatan 5 derajat
    delay(4000);
    gateServo.write(0);
    //    moveServoSmoothly(0, 0, 5);  // Memindahkan servo dari 0 derajat ke 180 derajat dengan kecepatan 5 derajat
  }
  /*AKHIR BUKA GERBANG MASUK*/

  /*BUKA GERBANG KELUAR MENGGUNAKAN RFID*/
  if (mfrcKeluar522.PICC_IsNewCardPresent() && mfrcKeluar522.PICC_ReadCardSerial()) {
    /*CONVERT BYTE DARI ANGKA ACAK MENJADI HEX*/
    for (byte i = 0; i < mfrcKeluar522.uid.size; i++) {
      //        IDTAG += mfrc522[reader].uid.uidByte[i];
      readcard[i] = mfrcKeluar522.uid.uidByte[i]; //storing the UID of the tag in readcard
      array_to_string(readcard, 4, str);
      StrUID = str;
    }
    //      Serial.println("Reader " + String(reader));

    //kirim uid kartu rfid untuk disimpan ke text input
    WiFiClient client;
    const int httpPort = 80;
    if (!client.connect(host, httpPort)) {
      Serial.println("Connection Failed");
      return;
    }
    String LinkKeluar;
    HTTPClient httpKeluar;
//    LinkKeluar = "http://192.168.100.222/parking/rest.php?uid=" + StrUID;
    LinkKeluar = "http://192.168.8.151/parking/open_gate_exit.php?uid=" + StrUID;
    httpKeluar.begin(client, LinkKeluar);

    int httpCodeKeluar = httpKeluar.GET();
    String payloadKeluar = httpKeluar.getString();
    Serial.println(payloadKeluar);
    Serial.println(StrUID);
    delay(200);
    httpKeluar.end();

    String linkServoKeluar;
    HTTPClient httpServoKeluar;
//    linkServoKeluar = "http://192.168.100.222/parking/open_gate_exit.php?uid=" + StrUID;
    linkServoKeluar = "http://192.168.8.151/parking/open_gate_exit.php?uid=" + StrUID;
    httpServoKeluar.begin(client, linkServoKeluar);
    int httpServoCodeKeluar = httpServoKeluar.GET();
    String responseServoKeluar = httpServoKeluar.getString();
    Serial.println(responseServoKeluar);
    httpServoKeluar.end();
    //set posisi servo keluar
    gateServoKeluar.write(responseServoKeluar.toInt());
    delay(4000);
    gateServoKeluar.write(0);
  }
  /*AKHIR GERBANG KELUAR*/


//  buttonState = digitalRead(BUTTON_PIN);
//  if (buttonState == HIGH) {
//    gateServo.write(180);
//    delay(4000);
//  }else{
//    gateServo.write(0);
//  }

  /*DETEKSI HALANGAN MENGGUNAKAN SENSOR IR CAR 1*/
  //  val = digitalRead(pin_ir_car1);
  //  //kirim uid kartu rfid untuk disimpan ke text input
  //  WiFiClient client;
  //  const int httpPort = 80;
  //  if (!client.connect(host, httpPort)) {
  //    Serial.println("Connection Failed");
  //    return;
  //  }
  //
  //  String LinkIR1;
  //  HTTPClient httpIR1;
}
//----------------------------------------Procedure to change the result of reading an array UID into a string------------------------------------------------------------------------------//
void array_to_string(byte array[], unsigned int len, char buffer[]) {
  for (unsigned int i = 0; i < len; i++)
  {
    byte nib1 = (array[i] >> 4) & 0x0F;
    byte nib2 = (array[i] >> 0) & 0x0F;
    buffer[i * 2 + 0] = nib1  < 0xA ? '0' + nib1  : 'A' + nib1  - 0xA;
    buffer[i * 2 + 1] = nib2  < 0xA ? '0' + nib2  : 'A' + nib2  - 0xA;
  }
  buffer[len * 2] = '\0';
}

//void moveServoSmoothly(int from, int to, int speed) {
//  int step = 1;
//  int delayTime = 15;  // Waktu jeda antara setiap langkah
//
//  if (from < to) {
//    for (int i = from; i <= to; i += step) {
//      pin_servo.writeMicroseconds(map(i, 180, 1000, 2000));  // Menggunakan fungsi map untuk mengonversi sudut menjadi mikrodetik
//      delay(delayTime);
//    }
//  } else {
//    for (int i = from; i >= to; i -= step) {
//      pin_servo.writeMicroseconds(map(i, 180, 1000, 2000));  // Menggunakan fungsi map untuk mengonversi sudut menjadi mikrodetik
//      delay(delayTime);
//    }
//  }
//}
