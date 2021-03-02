<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Ecommerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="View/assets/css/style.css?v=1">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="row">
            <div class="col-5 col-sm-2" id="logo">
                <a href="/"><img src="View/assets/svg/logo.svg"></a>
            </div>
            <div class="col-7 col-sm-7">
                <div class="search">
                    <img class="icon" src="View/assets/svg/icon-search.svg" alt="">
                    <input type="text" name="">
                    <div class="search-button">ARA</div>
                </div>
            </div>
            <div class="col-12 col-sm-3" id="nav">
                <div id="nav-login">
                    <span class="icon-user"></span>
                    <p>Giriş Yap</p>
                </div>
                <div id="nav-basket">
                    <span class="icon-basket"></span>
                    <p>Sepetim</p>
                    <div class="basket-item-count">1</div>
                </div>
            </div>
        </header> 
        <div class="content">
            <?php include($page); ?>
        </div>
        <footer class="footer">
            <p>©2021 Hacı Kandemir Ltd. Şti.</p>
            <a href="#">Kullanım Koşulları</a>
        </footer>
    </div>
</body>
</html>
