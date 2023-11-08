<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

  if(!isset($_SESSION['adminname']) && !isset($_SESSION['managername'])) {
          
    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>";

  }
  $rid = $_GET['id'];
  
  if ($_SESSION['managername']) {
    $id = $_SESSION['manager_id'];
    $resorts = $conn->query("SELECT * FROM resortinfo where id=$rid and mid=$id");
    $num = $resorts->rowCount();
    if (!$num) {
      echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
    }
  }
  else{
    $resorts = $conn->query("SELECT * FROM resortinfo where id=$rid");
    $num = $resorts->rowCount();
    if (!$num) {
      echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
    }
  }
  $resorts->execute();

  $allResorts = $resorts->fetch(PDO::FETCH_OBJ);

  if(isset($_POST['submit'])) {
            $poster = $allResorts->poster;
            $poster = explode('/', $poster);
            if (empty($_FILES['image']['name'])) {
              $image = $poster[count($poster)-1];
            }
            else{
              unlink($poster[count($poster)-3].'/'.$poster[count($poster)-2].'/'.$poster[count($poster)-1]);
              $image = $_FILES['image']['name'];
            }
            $name = $_POST['name'];
            $location = $_POST['location'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $roomTypes = $_POST['roomTypes'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $Highlights = $_POST['Highlights'];
            $overview = $_POST['overview'];
            $More = $_POST['More'];
            $amenities = $_POST['amenities'];

            $Count = $name;
            $Count = str_replace(" ", "", $Count);

            if (!file_exists("gallery/$Count")) {
              mkdir("gallery/$Count");
            }
              
              $dir = "gallery/$Count/". basename($image);

              $insert = $conn->prepare("UPDATE resortinfo SET Name = :name, location = :location, address = :address, contact_info = :contact, room_types = :roomTypes, price = :price, discount = :discount, highlights = :Highlights, overview = :overview, more = :More, amenities = :amenities, poster = :image WHERE id = $rid");

              $insert->execute([
                ":name" => $name,
                ":location" => $location,
                ":address" => $address,
                ":contact" => $contact,
                ":roomTypes" => $roomTypes,
                ":price" => $price,
                ":discount" => $discount,
                ":Highlights" => $Highlights,
                ":overview" => $overview,
                ":More" => $More,
                ":amenities" => $amenities,
                ":image" => ADMINURL."/resorts/gallery/$Count/".$image,
              ]);
              
              // if (!empty($_FILES['image']['name'])) {
                if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
                  echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
                }
              // }
              echo "<script> window.location.href='".ADMINURL."/resorts/show-resorts.php'; </script>";
  }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Add Resort</h5>
              <form method="POST" action="./update-resorts.php?id=<?php echo $rid; ?>" enctype="multipart/form-data" onsubmit="formSubmit()">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" value="<?php echo $allResorts->Name; ?>" id="form2Example1" class="form-control" placeholder="Resort name" />
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="location" value="<?php echo $allResorts->location; ?>" class="form-control" placeholder="Location" />
                </div>
                
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="address" value="<?php echo $allResorts->address; ?>" class="form-control" placeholder="Address" />
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="contact" value="<?php echo $allResorts->contact_info; ?>" class="form-control" placeholder="Contact No" />
                </div>

                <div class="form-outline mb-4 mt-4 d-flex flex-row">
                  <input type="text" id="roomTypes" class="form-control w-75" placeholder="Room Types" />
                  <input type="hidden" id="roomValue" name="roomTypes"/>
                  <button onclick="addRoom()" type="button" class="btn btn-dark">Add Room</button>
                </div>

                <div id="roomListing">
                  <?php
                    $rooms = $allResorts->room_types;
                    $rooms = explode(', ', $rooms);
                    for ($i=0; $i < count($rooms); $i++) { 
                      echo '<span class="align-items-center bg-dark text-light rounded-pill me-2 px-3">
                      <span class="roomName">'.$rooms[$i].'</span>
                      <svg onclick="deleteRoom(this)" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="ms-3 mb-1 bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                      </svg>
                    </span>';
                    }
                  ?>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="<?php echo $allResorts->price; ?>" name="price" class="form-control" placeholder="Price" />
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="<?php echo $allResorts->discount; ?>" name="discount" class="form-control" placeholder="Discount" />
                </div>


                <div class="form-group" id="Highlights">
                  <label>
                    Highlights
                    <button onclick="addTextbox('Highlights')" type="button" class="mx-3 btn-sm btn-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                    </button>
                  </label>
                  <div>
                    <?php
                      $highlightField = $allResorts->highlights;
                      $highlightField = explode('<--->', $highlightField);

                      for ($i=0; $i < count($highlightField); $i++) { 
                        echo '<textarea placeholder="Highlights" class="form-control Highlights my-2" rows="2">'.$highlightField[$i].'</textarea>';
                      }
                    ?>
                  </div>
                  <input type="hidden" name="Highlights" id="HighlightsValue">
                </div>


                <div class="form-group" id="Overview">
                  <label>
                    Overview
                    <button onclick="addTextbox('Overview')" type="button" class="mx-3 btn-sm btn-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                    </button>
                  </label>
                  <div>
                    <?php
                      $overviewField = $allResorts->overview;
                      $overviewField = explode('<--->', $overviewField);

                      for ($i=0; $i < count($overviewField); $i++) { 
                        echo '<textarea placeholder="Overview" class="form-control Overview my-2" rows="2">'.$overviewField[$i].'</textarea>';
                      }
                    ?>
                  </div>
                  <input type="hidden" name="overview" id="OverviewValue">
                </div>


                <div class="form-group" id="More">
                  <label>
                    More
                    <button onclick="addTextbox('More')" type="button" class="mx-3 btn-sm btn-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                    </button>
                  </label>
                  <div>
                    <?php
                      $moreField = $allResorts->more;
                      $moreField = explode('<--->', $moreField);

                      for ($i=0; $i < count($moreField); $i++) { 
                        echo '<textarea placeholder="More" class="form-control More my-2" rows="2">'.$moreField[$i].'</textarea>';
                      }
                    ?>
                  </div>
                  <input type="hidden" name="More" id="MoreValue">
                </div>


                <div>
                  <label>Amenities</label>
                  <div class="d-flex w-100 flex-row flex-wrap">

                    <?php
                      $amenQuery = $conn->query("select * from amenities");
                      $amenQuery->execute();

                      $allAmens = $amenQuery->fetchAll(PDO::FETCH_OBJ);

                      $checkdAmens = $allResorts->amenities;
                      $checkdAmens = explode(', ', $checkdAmens);
                    ?>
                    <?php foreach($allAmens as $amen)  : ?>
                      <div class="form-check col-3">
                        <input class="form-check-input amenInput" type="checkbox" value="<?php echo $amen->name; ?>" id="<?php echo $amen->name; ?>">
                        <label class="form-check-label" for="<?php echo $amen->name; ?>">
                        <?php echo $amen->name; ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                    <input type="hidden" name="amenities" id="amenValue">

                  </div>
                </div>
                <div class="form-outline mb-4 mt-4 d-flex flex-row justify-content-between">
                  <div class="col-5">
                    <label>Resort Image</label>
                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="Image" />
                  </div>
                  <div class="col-5">
                    <img width="100%" src="<?php echo $allResorts->poster; ?>" alt="">
                  </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
        function addTextbox(field) {
          let descField = document.getElementById(field)
          let creatingElement = document.createElement('div')
          creatingElement.innerHTML = `<textarea placeholder="${field}" class="form-control ${field} my-2" rows="2"></textarea>`
          descField.appendChild(creatingElement)
        }

        function setValue(field){
          let Values = document.getElementsByClassName(field)
          let takeInputField = document.getElementById(field+'Value')
          takeInputField.value = Values[0].value
          for (let index = 1; index < Values.length; index++) {
            const element = Values[index];
            takeInputField.value += '<--->'
            takeInputField.value += element.value
          }
        }
        
        function formSubmit() {
          setValue('Highlights')
          setValue('Overview')
          setValue('More')

          let roomFields = document.getElementsByClassName('roomName')
          let roomInput = document.getElementById('roomValue')
          roomInput.value = roomFields[0].innerHTML
          for (let index = 1; index < roomFields.length; index++) {
            const element = roomFields[index];
            roomInput.value += ', '
            roomInput.value += element.innerHTML
          }

          // for the checkboxes of amenities
          let amenInputField = document.getElementsByClassName('amenInput')
          let amenValueField = document.getElementById('amenValue')
          let calcVal = ''
          amenValueField.value = ''
          for (let index = 0; index < amenInputField.length; index++) {
            const element = amenInputField[index];
            if (element.checked) {
              calcVal += element.value 
              calcVal += ', '
            }
          }
          calcVal = calcVal.trim()
          calcVal = calcVal.slice(0, -1)
          amenValueField.value = calcVal
        }

        function deleteRoom(element) {
          let appendRegion = document.getElementById('roomListing')
          let parentEle = element.parentNode
          appendRegion.removeChild(parentEle)
        }

        function addRoom() {
          let roomName = document.getElementById('roomTypes').value.trim()
          if (roomName.length) {
            let appendRegion = document.getElementById('roomListing')
            appendRegion.innerHTML += `<span class="align-items-center bg-dark text-light rounded-pill me-2 px-3">
                      <span class="roomName">${roomName}</span>
                      <svg onclick="deleteRoom(this)" xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="ms-3 mb-1 bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                      </svg>
                    </span>`
                  }
          document.getElementById('roomTypes').value = ''
        }
        let amens
        <?php
          for ($i=0; $i < count($checkdAmens); $i++) { 
            echo "amens = document.getElementById('$checkdAmens[$i]');";
            echo "amens.checked = true;";
          }
        ?>
        
      </script>
<?php require "../layouts/footer.php"; ?>
