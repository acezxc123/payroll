<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>THERMAL SOLUTIONS INC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Igor Dimitrijević - SkyFlyer"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<?php require_once(dirname(__FILE__) . '/config.php'); 
?>
<main>
    
    <div class="ui-wrapper">
        <div class="ui-searchbar">
             <img style="width:80px" src="<?php echo BASE_URL?>/image/transparent.png">
            <h1>THERMAL SOLUTIONS INC</h1>
            <p>Human Resource Information System and Payroll</p>
        </div>

        <div class="ui-topsites">
            <a href="<?php echo BASE_URL; ?>attendance/" class="ui-topsites-item">
                <i class="fas fa-calendar ui-topsite-icon"></i>
                <span>Attendance</span>
                <span class="ui-topsites-item-edit"><i class="fas fa-ellipsis-v"></i></span>
            </a>

            <a  href="<?php echo BASE_URL; ?>attendance/generate" class="ui-topsites-item">
                <i class="fas fa-users ui-topsite-icon"></i>
                <span>QR</span>
                <span class="ui-topsites-item-edit"><i class="fas fa-ellipsis-v"></i></span>
            </a>

            <a href="<?php echo BASE_URL; ?>login" class="ui-topsites-item">
                <i class="fas fa-user ui-topsite-icon"></i>
                <span>Admin</span>
                <span class="ui-topsites-item-edit"><i class="fas fa-ellipsis-v"></i></span>
            </a>
        </div>
      
    </div>
</main>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
<style>
    @import url("https://fonts.googleapis.com/css?family=Noto+Sans+HK&display=swap");
@import url("https://use.fontawesome.com/releases/v5.6.3/css/solid.css");
@import url("https://use.fontawesome.com/releases/v5.6.3/css/fontawesome.css");
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  -webkit-tap-highlight-color: transparent;
}

body {
  background: linear-gradient(to right, #0575e6, #021b79);
  color: #FFF;
  font-family: "Poppins", sans-serif;
}

a {
  text-decoration: none;
}

main {
  display: flex;
  flex-direction: column;
  width: 100vw;
  height: 100vh;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.fas {
  font-size: 1.3rem;
  color: #FFF;
}

.ui-toolbar {
  padding: 1rem;
  text-align: right;
}

.ui-toolbar a {
  padding: 10px;
  color: #FFF;
  transition: background linear 0.2s;
}

.ui-toolbar a:hover {
  background: rgba(0, 0, 0, 0.25);
}

.ui-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  height: 85vh;
}

.ui-searchbar {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.ui-searchbar h1 {
  margin-bottom: 2rem;
  font-size: 3rem;
  color: #FFF;
  letter-spacing: 4px;
}

.ui-searchbar input {
  width: 30rem;
  padding: 1rem 1rem;
  border-radius: 30px;
  border: none;
  outline: 0;
  font-family: "Roboto", sans-serif;
  font-weight: bold;
}

.ui-topsites {
  display: grid;
  grid-template-rows: auto auto;
  grid-template-columns: auto auto auto auto;
  grid-row-gap: 15px;
  width: 20%;
  margin: 2rem auto 0 auto;
  text-align: center;
}

@media screen and (max-width: 767px) {

    .ui-topsites {
  display: block;
  grid-template-rows: auto auto;
  grid-template-columns: auto auto auto auto;
  grid-row-gap: 15px;
  width: 100%;
  margin: 2rem auto 0 auto;
  text-align: center;
}

.ui-searchbar h1 {
    margin-top: 20px;
  margin-bottom: 2rem;
  font-size: 1rem;
  color: #FFF;
  letter-spacing: 4px;
}
}

.ui-topsites-item {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 1rem;
  border-radius: 8px;
  position: relative;
  transition: background ease-in 0.3s;
}

.ui-topsites-item:hover {
  background: rgba(0, 0, 0, 0.15);
}

.ui-topsites-item:hover > .ui-topsite-icon {
  background: #09F;
}

.ui-topsites-item-edit {
  position: absolute;
  top: 5px;
  right: 5px;
  opacity: 0;
  transition: all linear 0.2s;
}

.ui-topsites-item-edit:hover {
  opacity: 1;
}

.ui-topsite-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 0.7rem;
  width: 3rem;
  height: 3rem;
  background: rgba(0, 0, 0, 0.3);
  border-radius: 50px;
  pointer-events: none;
  color: #FFF;
  transition: background ease-in 0.1s;
}

.ui-topsites-item span {
  color: #FFF;
  letter-spacing: 2px;
  font-size: 16px;
}

.ui-edit {
  width: 100%;
  padding-right: 2rem;
  text-align: right;
}

#btn-edit {
  cursor: pointer;
}
</style>
</html>
