<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"><link rel="stylesheet" href="animeyt.css">
  <title>AnimeYT</title>
</head>

<body>
  <header class="header content">
    <div class="header-img">
      <img src="img/anime.jpg" alt="imagen de portada">
    </div>

    <div class="header-overlay"></div>
    <div class="header-content">

      <div class="logo">
        <img src="img/logo.png" alt="" style="width: 50%; margin-top: -15%; margin-left: -17%;  position: absolute;">
      </div>

      <div style="margin-left: -15%;">

        <div style="margin-right: -100%; margin-top: 20%;">
          <button type="button" id="popular" class="btn btn-primary" data-bs-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true" >Animes Populares</button>
        </div>

      </div>

    </div>

  </header>
  <!-- style="background-image: url('img/anime2.jpg');" -->
  <div id="contenido"></div>
  <a href="" style="text-decoration: none;"></a>
  <script>
    document.getElementById("popular").addEventListener("click", async function() {
      let formData = new FormData();

      formData.append("action", "animesPopulares");

      let res = await fetch("controlador.php", {
        method: "POST",
        body: formData,
      });

      let data = await res.text();

      document.getElementById("contenido").innerHTML = data;
    });

    document.getElementById("verAnime").addEventListener("click", async function() {
      let formData = new FormData();

      formData.append("action", "verAnime");

      let res = await fetch("controlador.php", {
        method: "POST",
        body: formData,
      });

      let data = await res.text();

      document.getElementById("contenido").innerHTML = data;
    });
  </script>
</body>

</html>