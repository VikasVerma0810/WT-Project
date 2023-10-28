    <div class="h-100 mt-4 filter-container px-1">
        <div>
            <div class="filters-header">
                <div class="heading">Filter</div>
                <button onclick="resetfields()" class="btn btn-sm radius-lg filter-reset-button">Reset</button>
            </div>
            <div class="sub-filter-heading">
                <div>Facilities</div>
            </div>
            <div class="amenities">
                <?php
                    $sql = "select * from amenities";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    for ($i=0; $i < $num; $i++) { 
                        $row = mysqli_fetch_assoc($result);
                        $amenName = $row['name'];
                        $newText = str_replace(" ", "", $amenName);
                        $amenId = $row['id'];
                        echo '<div class="checkbox-filter">
                            <label for="filter_facility_pool'.$i.'" class="custom-checkbox">
                                <input type="checkbox" name='.$newText.' id="filter_facility_pool'.$i.'" value="'.$amenName.'">
                                <span class="custom-checkbox-icon"></span>
                                '.$amenName.'
                            </label>
                        </div>';
                    }
                ?>
            </div>

            <div class="sub-filter-heading">
                <div>Locations</div>
            </div>
            <div class="location">
                <div class="search-bar">
                    <input type="text" oninput="locationSuggest()" id="location" class="w-100" placeholder="Enter Location">
                    <ul id="location-suggestion"></ul>
                </div>
                <div class="mt-2" id="location-list">
                    <!-- <div>
                        <p class="py-1 px-3 my-2 bg-warning rounded-pill">
                            <span>Pune</span>
                            <svg xmlns="http://www.w3.org/2000/svg" onclick="removeLocation(this)" width="16" height="16" fill="currentColor" class="my-1 bi bi-x-circle" viewBox="0 0 16 16" style="float:right;cursor:pointer;">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </p>
                    </div> -->
                </div>
            </div>


            <div class="sub-filter-heading">
                <div>Rating</div>
            </div>
            <div class="ratings">
                <div class="checkbox-filter">
                    <label for="filter_rating_5" class="custom-checkbox">
                        <input type="checkbox" name="5" id="filter_rating_5" value="5">
                        <span class="custom-checkbox-icon"></span>
                        5 Stars
                    </label>
                </div>
                <div class="checkbox-filter">
                    <label for="filter_rating_4" class="custom-checkbox">
                        <input type="checkbox" name="4" id="filter_rating_4" value="4">
                        <span class="custom-checkbox-icon"></span>
                        4 Stars
                    </label>
                </div>
                <div class="checkbox-filter">
                    <label for="filter_rating_3" class="custom-checkbox">
                        <input type="checkbox" name="3" id="filter_rating_3" value="3">
                        <span class="custom-checkbox-icon"></span>
                        3 Stars
                    </label>
                </div>
                <div class="checkbox-filter">
                    <label for="filter_rating_2" class="custom-checkbox">
                        <input type="checkbox" name="2" id="filter_rating_2" value="2">
                        <span class="custom-checkbox-icon"></span>
                        2 Stars
                    </label>
                </div>
                <div class="checkbox-filter">
                    <label for="filter_rating_1" class="custom-checkbox">
                        <input type="checkbox" name="1" id="filter_rating_1" value="1">
                        <span class="custom-checkbox-icon"></span>
                        1 Star
                    </label>
                </div>
            </div>

            <div class="sub-filter-heading">
                <div>Duration</div>
            </div>
            <div>
                <div class="checkbox-filter">
                    <label for="filter_duration_0_2hours" class="custom-checkbox">
                        <input type="checkbox" name="durations" id="filter_duration_0_2hours" value="0_2hours">
                        <span class="custom-checkbox-icon"></span>
                        0-2 Hours
                    </label>
                </div>
                <div class="checkbox-filter">
                    <label for="filter_duration_2_5hours" class="custom-checkbox">
                        <input type="checkbox" name="durations" id="filter_duration_2_5hours" value="2_5hours">
                        <span class="custom-checkbox-icon"></span>
                        2-5 Hours
                    </label>
                </div>
                <div class="checkbox-filter">
                    <label for="filter_duration_full_day" class="custom-checkbox">
                        <input type="checkbox" name="durations" id="filter_duration_full_day" value="full_day">
                        <span class="custom-checkbox-icon"></span>
                        Full Day
                    </label>
                </div>
                <div class="checkbox-filter">
                    <label for="filter_duration_multi_day" class="custom-checkbox">
                        <input type="checkbox" name="durations" id="filter_duration_multi_day" value="multi_day">
                        <span class="custom-checkbox-icon"></span>
                        Multi Day
                    </label>
                </div>
            </div>
        </div>
        <div>
            <button onclick="applyFilter()" class="btn btn-sm radius-lg filter-reset-button mx-auto">Apply</button>
        </div>
    </div>
    <script>
        const ratings = document.getElementsByClassName('ratings')
        const ratingFields = ratings[0].getElementsByTagName('input');

        const amenities = document.getElementsByClassName('amenities')
        const amenFields = amenities[0].getElementsByTagName('input');

        const locations = document.getElementsByClassName('search-bar')
        const locaFields = locations[0].getElementsByTagName('input');
        const suggestionList = document.getElementById("location-suggestion");
        const suggestionSaved = document.getElementById("location-list");
        
        for (let index = 0; index < ratingFields.length; index++) {
            const element = ratingFields[index];
            element.addEventListener('change', ()=>{
                for (let index2 = 0; index2 < ratingFields.length; index2++) {
                    const otherBox = ratingFields[index2];
                    if(otherBox !== element){
                        otherBox.checked = false
                    }
                }
            })
        }


        function resetfields(event) {
            // event.preventDefault();
            let parentCheckForm = document.getElementsByClassName('filter-container')
            let checkFields = parentCheckForm[0].getElementsByTagName('input')
            for (let index = 0; index < checkFields.length; index++) {
                const element = checkFields[index];
                element.checked = false
            }
        }

        function applyFilter() {
            let filterUrl = "./search.php?"
            let filterIds = []
            let count = 0
            

            // checking filters for amenities
            for (let index = 0; index < amenFields.length; index++) {
                const element = amenFields[index];
                if(element.checked){
                    filterIds[count] = `${element.value}`
                    count++;
                }
            }
            if(count){
                filterUrl += `&amenities=${filterIds.join(',')}`
            }


            // checking filters for ratings
            for (let index = 0; index < ratingFields.length; index++) {
                const element = ratingFields[index];
                if(element.checked){
                    filterUrl += `&rating=${element.value}`
                    break
                }
            }


            // checking for locations
            let locationVal = locaFields[0].value.trim()
            if (locationVal !== "") {
                filterUrl += `&location=${locationVal}`
            }

            window.location = filterUrl
        }



        async function locationSuggest() {
            let locationVal = locaFields[0].value.trim()
            // let suggestions = await fetch(`http://localhost/WT-Project/Partials/locationSug.php?location=${locationVal}`)
            let suggestions = await fetch(`http://localhost/MINI_Project_WT/Partials/locationSug.php?&location=${locationVal}`)
            suggestions = await suggestions.json()
            suggestionList.innerHTML = '';

            if (suggestions.length > 0) {
                suggestionList.style.display = "block";
                suggestions.forEach(suggestion => {
                    const listItem = document.createElement("li");
                    listItem.textContent = suggestion.location;
                    suggestionList.appendChild(listItem);

                    listItem.addEventListener("click", function() {
                        // When a suggestion is clicked, fill the input field with the suggestion and hide the suggestion list
                        locaFields[0].value = suggestion.location;
                        suggestionList.style.display = "none";

                        let addsuggestionSaved = document.createElement("div");
                        addsuggestionSaved.innerHTML = `<p class="py-1 px-3 my-2 bg-warning rounded-pill">
                        <span>${suggestion.location}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" onclick="removeLocation(this)" width="16" height="16" fill="currentColor" class="my-1 bi bi-x-circle" viewBox="0 0 16 16" style="float:right;cursor:pointer;">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        </p>`;
                        suggestionSaved.appendChild(addsuggestionSaved);
                    });
                });
            } else {
                suggestionList.style.display = "none";
            }
        }

        document.addEventListener("click", function(event) {
            if (event.target !== locaFields[0]) {
                suggestionList.style.display = "none";
            }
        });


        function removeLocation(element) {
            suggestionSaved.removeChild(element.parentNode.parentNode)
        }
    </script>