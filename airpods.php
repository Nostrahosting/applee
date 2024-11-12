<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AirPods</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Helvetica:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Helvetica', sans-serif;
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: -250px;
      width: 250px;
      height: 500%;
      background-color: #111;
      transition: 0.3s;
      z-index: 40;
    }
    .sidebar.open {
      left: 0;
    }
    .sidebar a {
      color: white;
      display: block;
      padding: 16px;
      text-decoration: none;
      font-size: 18px;
    }
    .sidebar a:hover {
      background-color: #575757;
    }
    .sidebar .closebtn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 30px;
      color: white;
      cursor: pointer;
    }

    .text-3xl {
      font-size: 5 rem; /* Membesarkan ukuran font hamburger */
      margin-left: 50px; /* Menambah jarak kiri */
    }
  </style>
 </head>
 <body class="bg-gray-100 text-gray-900">
  <!-- Sidebar -->
  <div class="sidebar" id="mySidebar">
   <span class="closebtn" onclick="closeNav()">
    ×
   </span>
   <a href="mac.php">
    Mac
   </a>
   <a href="ipad.php">
    iPad
   </a>
   <a href="iphone.php">
    iPhone
   </a>
   <a href="watch.php">
    Watch
   </a>
   <a href="airpods.php">
    AirPods
   </a>
  </div>

  <!-- Main content -->
<div class="container mx-auto flex justify-center items-center py-12">
  <span class="text-3xl cursor-pointer text-black mr-8" onclick="openNav()">&#9776; </span> <!-- Menambahkan margin untuk memberi jarak -->
  <a href="index.php" class="flex items-center">
    <img alt="Apple Logo" class="w-16 h-16 mx-auto" height="64" src="logo1.png" width="64"/> <!-- Ukuran logo diperbesar -->
    <span class="text-xl ml-2 font-semibold text-black">Apple Store</span> <!-- Teks di samping logo -->
  </a>
</div>


  <!-- AirPods content -->
  <div class="text-center py-12 bg-gray-100">
    <img alt="AirPods 4" class="w-full max-w-lg mx-auto rounded-lg" height="400" src="https://www.macworld.com/wp-content/uploads/2023/01/airpods3-hero-2.jpg?quality=50&strip=all&w=1024" width="600"/>
    <h1 class="text-3xl mt-6">AirPods 4</h1>
    <p class="text-lg text-gray-600 mt-2">All-new with spatial audio and adaptive EQ.</p>
   

  <div class="text-center py-12">
    <img alt="AirPods Pro 2" class="w-full max-w-lg mx-auto rounded-lg" height="400" src="https://images.thequint.com/thequint/2019-10/e1dd655f-57f4-4263-9ba3-bb557c5e704f/Screen_Shot_2019_10_28_at_10_30_45_PM.png?auto=format,compress" width="600"/>
    <h2 class="text-2xl mt-6">AirPods Pro 2</h2>
    <p class="text-lg text-gray-600 mt-2">Active noise cancellation and transparency mode.</p>
   
  </div>

  <div class="text-center py-12">
    <img alt="AirPods Max" class="w-full max-w-lg mx-auto rounded-lg" height="400" src="max.jpg" width="600"/>
    <h2 class="text-2xl mt-6">AirPods Max</h2>
    <p class="text-lg text-gray-600 mt-2">High-fidelity audio with an over-ear design.</p>

  </div>

  <div class="bg-white py-12 text-center">
  <h2 class="text-2xl mb-6">Which AirPods are right for you?</h2>
  
  <!-- Slider Container -->
  <div class="relative">
    <!-- Gambar Produk Besar -->
    <div class="overflow-hidden">
      <div class="flex transition-transform duration-500" id="productSlider">
        <?php
          // Koneksi ke database
          $servername = "localhost";
          $username = "root"; 
          $password = ""; 
          $dbname = "apple";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM airpods";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo '<div class="w-full px-4 flex-shrink-0">';
              echo '<img alt="'.$row["nama"].'" class="w-full max-w-3xl mx-auto" src="'.$row["gambar"].'"/>';
              echo '<h3 class="text-lg mt-4">'.$row["nama"].'</h3>';
              echo '<p class="text-sm text-gray-600">'.$row["spesifikasi"].'</p>';
              echo '</div>';
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <button onclick="prevSlide()" class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white bg-black p-2 rounded-full">
      &#8592;
    </button>
    <button onclick="nextSlide()" class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white bg-black p-2 rounded-full">
      &#8594;
    </button>
  </div>
</div>

<!-- JavaScript for Slider functionality -->
<script>
  let currentIndex = 0;
  const slider = document.getElementById('productSlider');
  const slides = slider.children;
  
  function updateSlider() {
    const slideWidth = slides[0].offsetWidth;
    slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
  }

  function nextSlide() {
    if (currentIndex < slides.length - 1) {
      currentIndex++;
    } else {
      currentIndex = 0;  // Loop back to the first slide
    }
    updateSlider();
  }

  function prevSlide() {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = slides.length - 1;  // Loop to the last slide
    }
    updateSlider();
  }

  // Optional: Set interval for automatic slide transition
  setInterval(nextSlide, 3000);  // Change slide every 3 seconds
</script>


  <div class="bg-gray-100 py-12 text-center">
    <h2 class="text-2xl mb-6">Get to know AirPods.</h2>
    <div class="flex justify-center flex-wrap">
    <div class="w-1/3 p-4">
     <img alt="Control with your hands - A person using hand gestures to control AirPods" class="w-full max-w-xs mx-auto" height="150" src="https://storage.googleapis.com/a1aa/image/1UoFxsVeNn2zFqqKEjd8a3G7sUemU2FeXTvkqm4B2pMCZYeOB.jpg" width="150"/>
     <h3 class="text-lg mt-4">
      Control with your hands
     </h3>
     <p class="text-sm text-gray-600">
      And what you don't.
     </p>
    </div>
    <div class="w-1/3 p-4">
     <img alt="Immersive sound - A person enjoying high-quality sound with AirPods" class="w-full max-w-xs mx-auto" height="150" src="https://storage.googleapis.com/a1aa/image/4KZvS7KzWpIWEtzqfU6SjfbMxdEFBdLnhgfE7PoJbVK0YYeOB.jpg" width="150"/>
     <h3 class="text-lg mt-4">
      Immersive sound
     </h3>
     <p class="text-sm text-gray-600">
      Fine-tuned to you.
     </p>
    </div>
    <div class="w-1/3 p-4">
     <img alt="Check all the colors - A display of AirPods in various colors" class="w-full max-w-xs mx-auto" height="150" src="https://storage.googleapis.com/a1aa/image/rd3jwGbxseyfaUnzsXOeLTWRXhP9vlDT834jlJCpD9V5YYeOB.jpg" width="150"/>
     <h3 class="text-lg mt-4">
      Check all the colors
        <p class="text-sm text-gray-600">Pick your favorite.</p>
    </div>
    </div>
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidebar").classList.add("open");
    }

    function closeNav() {
      document.getElementById("mySidebar").classList.remove("open");
    }
  </script>
 </body>
</html>
