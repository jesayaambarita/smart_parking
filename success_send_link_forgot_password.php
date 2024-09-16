<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" class="fikom">
    <title>Berhasil Mengirim Link Reset</title>
    <style>
      body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    background-color: #f0f0f0;
}

.circle {
    width: 150px;
    height: 150px;
    background-color: #4CAF50;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
    position: relative;
}

.thumb-icon {
    font-size: 60px;
    color: white;
    animation: none;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-30px);
    }
    60% {
        transform: translateY(-15px);
    }
}

.animate-button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.animate-button:hover {
    background-color: #45a049;
}
h1{
  color:  #45a049;
}

      </style>
</head>
<body>
    <div class="circle">
        <i class="thumb-icon">👍</i>
    </div>
    <h1>BERHASIL MENGIRIM LINK</h1>
    <button class="animate-button">Terimakasih</button>

    <script>
      document.querySelector('.animate-button').addEventListener('click', function() {
    const thumbIcon = document.querySelector('.thumb-icon');
    thumbIcon.style.animation = 'bounce 2s';

    thumbIcon.addEventListener('animationend', function() {
        thumbIcon.style.animation = '';
    });
});

    </script>
</body>
</html>