<style>
   h5.user-details {
    text-align: left;
    font-size: 1.15rem;
    color: #696f77 !important;
}
span.details{
    color:#9e9e9e !important;
} 
.profile-pic {
    max-width: 150px;
    max-height: 150px;
    margin-left: auto;
	margin-right: auto;
	display: block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 50%;
    overflow: hidden;
    width: 150px;
    margin: auto;
    align-items: center;
    height: 150px;
    border: 3px solid #6e6f6f;
    transition: all .3s;
    background-color: #bbbbbb;
}
.circle:hover {
  background-color: #909090;
  cursor: pointer
}
img {
    max-width:inherit;
    height: auto;
  /*  min-width: 212px;*/
  /*min-height: 212px;*/
}

.user-pf{
     
    align-items: center;
    text-align: center;
    vertical-align: middle;
}
</style>
<div class='content-layout' style="margin: 0;width: 100%;padding: 0;">
    <div class='row row-cols-1 row-cols-md-3 g-4' style=" width: inherit; margin: 0; ">
        
        <div class='col' style="margin:auto;padding: 0;width:100%;">
            <div class='my-cards card'>
                <div style="width: 70%;margin: 1rem auto;box-shadow: 0 0 12px #ddd;" id="middle_portion" class=' custom-card card-body'>
                    <ul style="margin: 0 12px !important;" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class=" link-size nav-item" role="presentation">
                            <button class="c-links nav-link active link-size " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#address" type="button" role="tab" aria-controls="pills-home" aria-selected="true">User Details</button>
                        </li>
                        <li class="link-size nav-item" role="presentation">
                            <button class="c-links nav-link link-size " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#transaction" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Account</button>
                        </li>
                        
                        <li class="link-size nav-item" role="presentation">
                            <button class="c-links nav-link link-size " id="pills-share-profile" data-bs-toggle="pill" data-bs-target="#share-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Share Profile</button>
                        </li>
                        
                        <li class="link-size nav-item" role="presentation">
                            <button class="c-links nav-link link-size " id="pills-view-profile" data-bs-toggle="pill" data-bs-target="#view-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">View Profile</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <!--User Details-->
                        <div class="tab-pane fade show active" id="address" role="tabpanel" aria-labelledby="pills-home-tab">
                            <hr style=' margin: 0 0 0.2rem 0;  '>

                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <form method="POST" action="<?=base_url()?>edit-user" style="padding: 0 2rem; width:100%;" class='c-form-control custom-pad2' enctype="multipart/form-data">
                                        <h4 style="text-align:center">Update Your Profile</h4>
                                       
                                        <div class='form-group user-pf c-form-group'>
                                           <div class="small-12 medium-2 large-2 columns">
                                             <div class="circle upload-button">
                                               <!-- User Profile Image -->
                                               <img class="profile-pic" src="<?=base_url(@$row['profile_picture'])?>">
                                           
                                               <!-- Default Image -->
                                               <i style="padding: 2rem 0;overflow: hidden;font-size: 7rem;" class="fa fa-user fa-5x"></i>
                                             </div>
                                                <input class="file-upload" type="file" accept="image/*"/ name="user_image" >
                                              <label style="margin-left:0" class='custom-label2'>Profile Photo</label>
                                            </div>
                                             <input type="hidden" value="<?=@$row['profile_picture']?>" name="profile_picture"  >
                                        </div>
        
                                        <div class="d-flex">
                                            <div class='form-group  c-form-group' style="width:45%">
        
                                            <label class='custom-label2'>Full Name</label>
                                            <div class='c-flex'>
                                                <i style='margin-right: 0.5rem;' class='fas fa-user form-u-name'></i>
                                                <input type='text' name="name" value="<?=@$row['name']?>" class='form-control ' placeholder='Enter First Name'  required>
                                            </div>
                                        </div>
                                            <div class='form-group  c-form-group' style="width:45%">
                                            <label class='custom-label2'>Country</label>
                                            <div class='c-flex'>
                                                <i style='margin-right: 0.5rem;height: 33px;width: 33px;' class='fas fa-flag form-u-name'></i>
                                               
                                                
                                                <select id='country' class='form-control' name='country' value="<?=@$row['country']?>" required>
                                                   <option value="Afganistan">Afghanistan</option>
                                                   <option value="Albania">Albania</option>
                                                   <option value="Algeria">Algeria</option>
                                                   <option value="American Samoa">American Samoa</option>
                                                   <option value="Andorra">Andorra</option>
                                                   <option value="Angola">Angola</option>
                                                   <option value="Anguilla">Anguilla</option>
                                                   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                   <option value="Argentina">Argentina</option>
                                                   <option value="Armenia">Armenia</option>
                                                   <option value="Aruba">Aruba</option>
                                                   <option value="Australia">Australia</option>
                                                   <option value="Austria">Austria</option>
                                                   <option value="Azerbaijan">Azerbaijan</option>
                                                   <option value="Bahamas">Bahamas</option>
                                                   <option value="Bahrain">Bahrain</option>
                                                   <option value="Bangladesh">Bangladesh</option>
                                                   <option value="Barbados">Barbados</option>
                                                   <option value="Belarus">Belarus</option>
                                                   <option value="Belgium">Belgium</option>
                                                   <option value="Belize">Belize</option>
                                                   <option value="Benin">Benin</option>
                                                   <option value="Bermuda">Bermuda</option>
                                                   <option value="Bhutan">Bhutan</option>
                                                   <option value="Bolivia">Bolivia</option>
                                                   <option value="Bonaire">Bonaire</option>
                                                   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                   <option value="Botswana">Botswana</option>
                                                   <option value="Brazil">Brazil</option>
                                                   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                   <option value="Brunei">Brunei</option>
                                                   <option value="Bulgaria">Bulgaria</option>
                                                   <option value="Burkina Faso">Burkina Faso</option>
                                                   <option value="Burundi">Burundi</option>
                                                   <option value="Cambodia">Cambodia</option>
                                                   <option value="Cameroon">Cameroon</option>
                                                   <option value="Canada">Canada</option>
                                                   <option value="Canary Islands">Canary Islands</option>
                                                   <option value="Cape Verde">Cape Verde</option>
                                                   <option value="Cayman Islands">Cayman Islands</option>
                                                   <option value="Central African Republic">Central African Republic</option>
                                                   <option value="Chad">Chad</option>
                                                   <option value="Channel Islands">Channel Islands</option>
                                                   <option value="Chile">Chile</option>
                                                   <option value="China">China</option>
                                                   <option value="Christmas Island">Christmas Island</option>
                                                   <option value="Cocos Island">Cocos Island</option>
                                                   <option value="Colombia">Colombia</option>
                                                   <option value="Comoros">Comoros</option>
                                                   <option value="Congo">Congo</option>
                                                   <option value="Cook Islands">Cook Islands</option>
                                                   <option value="Costa Rica">Costa Rica</option>
                                                   <option value="Cote DIvoire">Cote DIvoire</option>
                                                   <option value="Croatia">Croatia</option>
                                                   <option value="Cuba">Cuba</option>
                                                   <option value="Curaco">Curacao</option>
                                                   <option value="Cyprus">Cyprus</option>
                                                   <option value="Czech Republic">Czech Republic</option>
                                                   <option value="Denmark">Denmark</option>
                                                   <option value="Djibouti">Djibouti</option>
                                                   <option value="Dominica">Dominica</option>
                                                   <option value="Dominican Republic">Dominican Republic</option>
                                                   <option value="East Timor">East Timor</option>
                                                   <option value="Ecuador">Ecuador</option>
                                                   <option value="Egypt">Egypt</option>
                                                   <option value="El Salvador">El Salvador</option>
                                                   <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                   <option value="Eritrea">Eritrea</option>
                                                   <option value="Estonia">Estonia</option>
                                                   <option value="Ethiopia">Ethiopia</option>
                                                   <option value="Falkland Islands">Falkland Islands</option>
                                                   <option value="Faroe Islands">Faroe Islands</option>
                                                   <option value="Fiji">Fiji</option>
                                                   <option value="Finland">Finland</option>
                                                   <option value="France">France</option>
                                                   <option value="French Guiana">French Guiana</option>
                                                   <option value="French Polynesia">French Polynesia</option>
                                                   <option value="French Southern Ter">French Southern Ter</option>
                                                   <option value="Gabon">Gabon</option>
                                                   <option value="Gambia">Gambia</option>
                                                   <option value="Georgia">Georgia</option>
                                                   <option value="Germany">Germany</option>
                                                   <option value="Ghana">Ghana</option>
                                                   <option value="Gibraltar">Gibraltar</option>
                                                   <option value="Great Britain">Great Britain</option>
                                                   <option value="Greece">Greece</option>
                                                   <option value="Greenland">Greenland</option>
                                                   <option value="Grenada">Grenada</option>
                                                   <option value="Guadeloupe">Guadeloupe</option>
                                                   <option value="Guam">Guam</option>
                                                   <option value="Guatemala">Guatemala</option>
                                                   <option value="Guinea">Guinea</option>
                                                   <option value="Guyana">Guyana</option>
                                                   <option value="Haiti">Haiti</option>
                                                   <option value="Hawaii">Hawaii</option>
                                                   <option value="Honduras">Honduras</option>
                                                   <option value="Hong Kong">Hong Kong</option>
                                                   <option value="Hungary">Hungary</option>
                                                   <option value="Iceland">Iceland</option>
                                                   <option value="Indonesia">Indonesia</option>
                                                   <option value="India">India</option>
                                                   <option value="Iran">Iran</option>
                                                   <option value="Iraq">Iraq</option>
                                                   <option value="Ireland">Ireland</option>
                                                   <option value="Isle of Man">Isle of Man</option>
                                                   <option value="Israel">Israel</option>
                                                   <option value="Italy">Italy</option>
                                                   <option value="Jamaica">Jamaica</option>
                                                   <option value="Japan">Japan</option>
                                                   <option value="Jordan">Jordan</option>
                                                   <option value="Kazakhstan">Kazakhstan</option>
                                                   <option value="Kenya">Kenya</option>
                                                   <option value="Kiribati">Kiribati</option>
                                                   <option value="Korea North">Korea North</option>
                                                   <option value="Korea Sout">Korea South</option>
                                                   <option value="Kuwait">Kuwait</option>
                                                   <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                   <option value="Laos">Laos</option>
                                                   <option value="Latvia">Latvia</option>
                                                   <option value="Lebanon">Lebanon</option>
                                                   <option value="Lesotho">Lesotho</option>
                                                   <option value="Liberia">Liberia</option>
                                                   <option value="Libya">Libya</option>
                                                   <option value="Liechtenstein">Liechtenstein</option>
                                                   <option value="Lithuania">Lithuania</option>
                                                   <option value="Luxembourg">Luxembourg</option>
                                                   <option value="Macau">Macau</option>
                                                   <option value="Macedonia">Macedonia</option>
                                                   <option value="Madagascar">Madagascar</option>
                                                   <option value="Malaysia">Malaysia</option>
                                                   <option value="Malawi">Malawi</option>
                                                   <option value="Maldives">Maldives</option>
                                                   <option value="Mali">Mali</option>
                                                   <option value="Malta">Malta</option>
                                                   <option value="Marshall Islands">Marshall Islands</option>
                                                   <option value="Martinique">Martinique</option>
                                                   <option value="Mauritania">Mauritania</option>
                                                   <option value="Mauritius">Mauritius</option>
                                                   <option value="Mayotte">Mayotte</option>
                                                   <option value="Mexico">Mexico</option>
                                                   <option value="Midway Islands">Midway Islands</option>
                                                   <option value="Moldova">Moldova</option>
                                                   <option value="Monaco">Monaco</option>
                                                   <option value="Mongolia">Mongolia</option>
                                                   <option value="Montserrat">Montserrat</option>
                                                   <option value="Morocco">Morocco</option>
                                                   <option value="Mozambique">Mozambique</option>
                                                   <option value="Myanmar">Myanmar</option>
                                                   <option value="Nambia">Nambia</option>
                                                   <option value="Nauru">Nauru</option>
                                                   <option value="Nepal">Nepal</option>
                                                   <option value="Netherland Antilles">Netherland Antilles</option>
                                                   <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                   <option value="Nevis">Nevis</option>
                                                   <option value="New Caledonia">New Caledonia</option>
                                                   <option value="New Zealand">New Zealand</option>
                                                   <option value="Nicaragua">Nicaragua</option>
                                                   <option value="Niger">Niger</option>
                                                   <option value="Nigeria">Nigeria</option>
                                                   <option value="Niue">Niue</option>
                                                   <option value="Norfolk Island">Norfolk Island</option>
                                                   <option value="Norway">Norway</option>
                                                   <option value="Oman">Oman</option>
                                                   <option value="Pakistan">Pakistan</option>
                                                   <option value="Palau Island">Palau Island</option>
                                                   <option value="Palestine">Palestine</option>
                                                   <option value="Panama">Panama</option>
                                                   <option value="Papua New Guinea">Papua New Guinea</option>
                                                   <option value="Paraguay">Paraguay</option>
                                                   <option value="Peru">Peru</option>
                                                   <option value="Phillipines">Philippines</option>
                                                   <option value="Pitcairn Island">Pitcairn Island</option>
                                                   <option value="Poland">Poland</option>
                                                   <option value="Portugal">Portugal</option>
                                                   <option value="Puerto Rico">Puerto Rico</option>
                                                   <option value="Qatar">Qatar</option>
                                                   <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                   <option value="Republic of Serbia">Republic of Serbia</option>
                                                   <option value="Reunion">Reunion</option>
                                                   <option value="Romania">Romania</option>
                                                   <option value="Russia">Russia</option>
                                                   <option value="Rwanda">Rwanda</option>
                                                   <option value="St Barthelemy">St Barthelemy</option>
                                                   <option value="St Eustatius">St Eustatius</option>
                                                   <option value="St Helena">St Helena</option>
                                                   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                   <option value="St Lucia">St Lucia</option>
                                                   <option value="St Maarten">St Maarten</option>
                                                   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                   <option value="Saipan">Saipan</option>
                                                   <option value="Samoa">Samoa</option>
                                                   <option value="Samoa American">Samoa American</option>
                                                   <option value="San Marino">San Marino</option>
                                                   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                   <option value="Saudi Arabia">Saudi Arabia</option>
                                                   <option value="Senegal">Senegal</option>
                                                   <option value="Seychelles">Seychelles</option>
                                                   <option value="Sierra Leone">Sierra Leone</option>
                                                   <option value="Singapore">Singapore</option>
                                                   <option value="Slovakia">Slovakia</option>
                                                   <option value="Slovenia">Slovenia</option>
                                                   <option value="Solomon Islands">Solomon Islands</option>
                                                   <option value="Somalia">Somalia</option>
                                                   <option value="South Africa">South Africa</option>
                                                   <option value="Spain">Spain</option>
                                                   <option value="Sri Lanka">Sri Lanka</option>
                                                   <option value="Sudan">Sudan</option>
                                                   <option value="Suriname">Suriname</option>
                                                   <option value="Swaziland">Swaziland</option>
                                                   <option value="Sweden">Sweden</option>
                                                   <option value="Switzerland">Switzerland</option>
                                                   <option value="Syria">Syria</option>
                                                   <option value="Tahiti">Tahiti</option>
                                                   <option value="Taiwan">Taiwan</option>
                                                   <option value="Tajikistan">Tajikistan</option>
                                                   <option value="Tanzania">Tanzania</option>
                                                   <option value="Thailand">Thailand</option>
                                                   <option value="Togo">Togo</option>
                                                   <option value="Tokelau">Tokelau</option>
                                                   <option value="Tonga">Tonga</option>
                                                   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                   <option value="Tunisia">Tunisia</option>
                                                   <option value="Turkey">Turkey</option>
                                                   <option value="Turkmenistan">Turkmenistan</option>
                                                   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                   <option value="Tuvalu">Tuvalu</option>
                                                   <option value="Uganda">Uganda</option>
                                                   <option value="United Kingdom">United Kingdom</option>
                                                   <option value="Ukraine">Ukraine</option>
                                                   <option value="United Arab Erimates">United Arab Emirates</option>
                                                   <option value="United States of America">United States of America</option>
                                                   <option value="Uraguay">Uruguay</option>
                                                   <option value="Uzbekistan">Uzbekistan</option>
                                                   <option value="Vanuatu">Vanuatu</option>
                                                   <option value="Vatican City State">Vatican City State</option>
                                                   <option value="Venezuela">Venezuela</option>
                                                   <option value="Vietnam">Vietnam</option>
                                                   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                   <option value="Wake Island">Wake Island</option>
                                                   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                   <option value="Yemen">Yemen</option>
                                                   <option value="Zaire">Zaire</option>
                                                   <option value="Zambia">Zambia</option>
                                                   <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                                <script>
                                                    $(document).ready(function(){
                                                            var theValue = "<?=@$row['country']?>";
                                                            $('#country option[value=' + theValue + ']').attr('selected',true);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="d-flex">
                                            <div class='form-group c-form-group' style="width:45%">
                                                <label style='margin-bottom: 0;' class='custom-label2'>Date of Birth</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.5rem;' class='fas fa-calendar-week form-u-name'></i>
                                                    <input type='date' name="dob" id="date" class='form-control ' placeholder='Choose date'  required>
                                                    <?php if(@$row['dob']){ ?>
                                                        <script type="text/javascript">
                                                          document.getElementById('date').value = '<?=$row["dob"]?>';
                                                        </script>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                            <div class='form-group c-form-group' style="width:45%">
                                                <label class='custom-label2'>Primary Phone Number</label>
                                                <div class='c-flex'>
                                                    <i style='margin-right: 0.5rem;' class='fas fa-phone form-u-name'></i>
                                                    <input type='number' name="phone" value="<?=@$row['phone']?>"  class='form-control ' placeholder='Enter Your Number'  required>
                                                </div>
                                            </div>
                                        </div>
                                        <div style='border-bottom: none;text-align: center;' class='form-group c-form-group' >
                                            <button style="width:50%; margin:auto;font-size:1.25rem;" type='submit' class='btn btn-primary'>Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--Account-->
                        <div class="tab-pane fade custom-pad" id="transaction" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <hr style=' margin: 0 0 1rem 0;'>
                            <form method="POST" action="<?=base_url()?>update-account"  class='c-form-control custom-pad2'>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='form-group  c-form-group'>
                                            <label class='custom-label2'>Enter associate email:</label>
                                            <div class='c-flex'>
                                                <i style='margin-right: 0.5rem;' class='fas fa-envelope form-u-name'></i>
                                                <input type='text' name="email" class='form-control' value="<?=@$row['email']?>" readonly>
                                            </div>
                                            <!--<p style="color: #048804;margin: 1rem 0 0 2.5rem;text-shadow: 0 0 1px #048804;"><i style="margin-right:1rem;" class="fas fa-check"></i>Email is verified</p>-->
                                        </div>
                                        
                                        <div class='form-group  c-form-group'>
                                            <label class='custom-label2'>Language</label>
                                            <div class='c-flex'>
                                                <i style='margin-right: 0.5rem;' class='fas fa-pencil-alt form-u-name'></i>
                                                <select class='form-control' id="lang" name="lang" value="<?=@$row['lang']?>" required>
                                                  <option>Choose your language...</option>
                                                  <option value="Afrikaans">Afrikaans</option>
                                                  <option value="Albanian">Albanian</option>
                                                  <option value="Arabic">Arabic</option>
                                                  <option value="Armenian">Armenian</option>
                                                  <option value="Basque">Basque</option>
                                                  <option value="Bengali">Bengali</option>
                                                  <option value="Bulgarian">Bulgarian</option>
                                                  <option value="Catalan">Catalan</option>
                                                  <option value="Cambodian">Cambodian</option>
                                                  <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                                  <option value="Croatian">Croatian</option>
                                                  <option value="Czech">Czech</option>
                                                  <option value="Danish">Danish</option>
                                                  <option value="Dutch">Dutch</option>
                                                  <option value="English">English</option>
                                                  <option value="Estonian">Estonian</option>
                                                  <option value="Fiji">Fiji</option>
                                                  <option value="Finnish">Finnish</option>
                                                  <option value="French">French</option>
                                                  <option value="Georgian">Georgian</option>
                                                  <option value="German">German</option>
                                                  <option value="Greek">Greek</option>
                                                  <option value="Gujarati">Gujarati</option>
                                                  <option value="Hebrew">Hebrew</option>
                                                  <option value="Hindi">Hindi</option>
                                                  <option value="Hungarian">Hungarian</option>
                                                  <option value="Icelandic">Icelandic</option>
                                                  <option value="Indonesian">Indonesian</option>
                                                  <option value="Irish">Irish</option>
                                                  <option value="Italian">Italian</option>
                                                  <option value="Japanese">Japanese</option>
                                                  <option value="Javanese">Javanese</option>
                                                  <option value="Korean">Korean</option>
                                                  <option value="Latin">Latin</option>
                                                  <option value="Latvian">Latvian</option>
                                                  <option value="Lithuanian">Lithuanian</option>
                                                  <option value="Macedonian">Macedonian</option>
                                                  <option value="Malay">Malay</option>
                                                  <option value="Malayalam">Malayalam</option>
                                                  <option value="Maltese">Maltese</option>
                                                  <option value="Maori">Maori</option>
                                                  <option value="Marathi">Marathi</option>
                                                  <option value="Mongolian">Mongolian</option>
                                                  <option value="Nepali">Nepali</option>
                                                  <option value="Norwegian">Norwegian</option>
                                                  <option value="Persian">Persian</option>
                                                  <option value="Polish">Polish</option>
                                                  <option value="Portuguese">Portuguese</option>
                                                  <option value="Punjabi">Punjabi</option>
                                                  <option value="Quechua">Quechua</option>
                                                  <option value="Romanian">Romanian</option>
                                                  <option value="Russian">Russian</option>
                                                  <option value="Samoan">Samoan</option>
                                                  <option value="Serbian">Serbian</option>
                                                  <option value="Slovak">Slovak</option>
                                                  <option value="Slovenian">Slovenian</option>
                                                  <option value="Spanish">Spanish</option>
                                                  <option value="Swahili">Swahili</option>
                                                  <option value="Swedish ">Swedish </option>
                                                  <option value="Tamil">Tamil</option>
                                                  <option value="Tatar">Tatar</option>
                                                  <option value="Telugu">Telugu</option>
                                                  <option value="Thai">Thai</option>
                                                  <option value="Tibetan">Tibetan</option>
                                                  <option value="Tonga">Tonga</option>
                                                  <option value="Turkish">Turkish</option>
                                                  <option value="Ukrainian">Ukrainian</option>
                                                  <option value="Urdu">Urdu</option>
                                                  <option value="Uzbek">Uzbek</option>
                                                  <option value="Vietnamese">Vietnamese</option>
                                                  <option value="Welsh">Welsh</option>
                                                  <option value="Xhosa">Xhosa</option>
                                                </select>
                                                <script>
                                                    $(document).ready(function(){
                                                            var theValue = "<?=@$row['lang']?>";
                                                            $('#lang option[value=' + theValue + ']').attr('selected',true);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class='form-group  c-form-group'>
                                            <label class='custom-label2'>Local Currency</label>
                                            <div class='c-flex'>
                                                <i style='margin-right: 0.5rem;' class='fas fa-coins form-u-name'></i>
                                                <select class='form-control' id="currency" name="currency" value="<?=@$row['currency']?>">
                                                	<option selected="selected">Choose your currency..</option>
                                                	<option value="USD">United States Dollar</option>
                                                	<option value="EUR">Euro</option>
                                                	<option value="GBP">United Kingdom Pounds</option>
                                                	<option value="DZD">Algeria Dinars</option>
                                                	<option value="ARP">Argentina Pesos</option>
                                                	<option value="AUD">Australia Dollars</option>
                                                	<option value="ATS">Austria Schillings</option>
                                                	<option value="BSD">Bahamas Dollars</option>
                                                	<option value="BBD">Barbados Dollars</option>
                                                	<option value="BEF">Belgium Francs</option>
                                                	<option value="BMD">Bermuda Dollars</option>
                                                	<option value="BRR">Brazil Real</option>
                                                	<option value="BGL">Bulgaria Lev</option>
                                                	<option value="CAD">Canada Dollars</option>
                                                	<option value="CLP">Chile Pesos</option>
                                                	<option value="CNY">China Yuan Renmimbi</option>
                                                	<option value="CYP">Cyprus Pounds</option>
                                                	<option value="CSK">Czech Republic Koruna</option>
                                                	<option value="DKK">Denmark Kroner</option>
                                                	<option value="NLG">Dutch Guilders</option>
                                                	<option value="XCD">Eastern Caribbean Dollars</option>
                                                	<option value="EGP">Egypt Pounds</option>
                                                	<option value="FJD">Fiji Dollars</option>
                                                	<option value="FIM">Finland Markka</option>
                                                	<option value="FRF">France Francs</option>
                                                	<option value="DEM">Germany Deutsche Marks</option>
                                                	<option value="XAU">Gold Ounces</option>
                                                	<option value="GRD">Greece Drachmas</option>
                                                	<option value="HKD">Hong Kong Dollars</option>
                                                	<option value="HUF">Hungary Forint</option>
                                                	<option value="ISK">Iceland Krona</option>
                                                	<option value="INR">India Rupees</option>
                                                	<option value="IDR">Indonesia Rupiah</option>
                                                	<option value="IEP">Ireland Punt</option>
                                                	<option value="ILS">Israel New Shekels</option>
                                                	<option value="ITL">Italy Lira</option>
                                                	<option value="JMD">Jamaica Dollars</option>
                                                	<option value="JPY">Japan Yen</option>
                                                	<option value="JOD">Jordan Dinar</option>
                                                	<option value="KRW">Korea (South) Won</option>
                                                	<option value="LBP">Lebanon Pounds</option>
                                                	<option value="LUF">Luxembourg Francs</option>
                                                	<option value="MYR">Malaysia Ringgit</option>
                                                	<option value="MXP">Mexico Pesos</option>
                                                	<option value="NLG">Netherlands Guilders</option>
                                                	<option value="NZD">New Zealand Dollars</option>
                                                	<option value="NOK">Norway Kroner</option>
                                                	<option value="PKR">Pakistan Rupees</option>
                                                	<option value="XPD">Palladium Ounces</option>
                                                	<option value="PHP">Philippines Pesos</option>
                                                	<option value="XPT">Platinum Ounces</option>
                                                	<option value="PLZ">Poland Zloty</option>
                                                	<option value="PTE">Portugal Escudo</option>
                                                	<option value="ROL">Romania Leu</option>
                                                	<option value="RUR">Russia Rubles</option>
                                                	<option value="SAR">Saudi Arabia Riyal</option>
                                                	<option value="XAG">Silver Ounces</option>
                                                	<option value="SGD">Singapore Dollars</option>
                                                	<option value="SKK">Slovakia Koruna</option>
                                                	<option value="ZAR">South Africa Rand</option>
                                                	<option value="KRW">South Korea Won</option>
                                                	<option value="ESP">Spain Pesetas</option>
                                                	<option value="XDR">Special Drawing Right (IMF)</option>
                                                	<option value="SDD">Sudan Dinar</option>
                                                	<option value="SEK">Sweden Krona</option>
                                                	<option value="CHF">Switzerland Francs</option>
                                                	<option value="TWD">Taiwan Dollars</option>
                                                	<option value="THB">Thailand Baht</option>
                                                	<option value="TTD">Trinidad and Tobago Dollars</option>
                                                	<option value="TRL">Turkey Lira</option>
                                                	<option value="VEB">Venezuela Bolivar</option>
                                                	<option value="ZMK">Zambia Kwacha</option>
                                                	<option value="EUR">Euro</option>
                                                	<option value="XCD">Eastern Caribbean Dollars</option>
                                                	<option value="XDR">Special Drawing Right (IMF)</option>
                                                	<option value="XAG">Silver Ounces</option>
                                                	<option value="XAU">Gold Ounces</option>
                                                	<option value="XPD">Palladium Ounces</option>
                                                	<option value="XPT">Platinum Ounces</option>
                                                </select>
                                                
                                                <script>
                                                    $(document).ready(function(){
                                                            var theValue = "<?=@$row['currency']?>";
                                                            $('#currency option[value=' + theValue + ']').attr('selected',true);
                                                    });
                                                </script>
                                            </div>
                                            
                                        </div>
                                        <div class='form-group  c-form-group'>
                                            <div class='c-flex'>
                                                <input style="margin-top: 0.4rem;" value="1" id="email_notification" name="email_notification" type="checkbox">
                                                <p class='custom-label2 c-term'>
                                                    <span class='custom-label2' style="margin:0;">Email notification</span>
                                                    <br />
                                                    You will get an email notification every time there is an activity in your account.
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                        if(@$row['email_notification']==1){
                                            echo "<script>document.getElementById('email_notification').checked = true;</script>";
                                        }
                                        ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class='form-group c-form-group'>
                                            <label class='custom-label2'>Select Primary wallet address</label>
                                            <div class='c-flex'>
                                                <i style='margin-right: 0.4rem;' class='fas fa-wallet  form-u-name'></i>
                                                <select name="primary_wallet_address" id="primary_wallet_address" class="form-control" required>
                                                    <option value="none">Select address</option>
                                                    <?php foreach($active_address as $rows): ?>
                                                        <option value="<?=$rows['add_wallet']?>"><?=$rows['add_wallet']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <script>
                                                    $(document).ready(function(){
                                                            var theValue = "<?=@$row['wallet']?>";
                                                            $('#primary_wallet_address option[value=' + theValue + ']').attr('selected',true);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style='border-bottom: none;' class='form-group c-form-group'>
                                    <button type='submit' class='btn btn-primary'>Update</button>
                                </div>
                            </form>
                        </div>
                        
                        <!--Share Profile-->
                        <div class="tab-pane fade custom-pad" id="share-profile" role="tabpanel" aria-labelledby="pills-share-profile">
                            <hr style=' margin: 0 0 1rem 0;'>
                            <form method="POST" id="fupForm" action="<?=base_url()?>update-share-account"  class='c-form-control custom-pad2'>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class='form-group  c-form-group'>
                                            <div class='c-flex'>
                                                <input style="margin-top: 0.4rem;" value='1' id="share_wallet" name="share_wallet" type="checkbox">
                                                <p class='custom-label2 c-term'>
                                                    <span class='custom-label2' style="margin:0;">Share Primary Wallet</span>
                                                    <br />
                                                    Click to share your wallet on your profile for other user that searched for you on this platform can review.
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                        if(@$row['share_wallet']==1){
                                            echo "<script>document.getElementById('share_wallet').checked = true;</script>";
                                        }
                                        ?>
                                    </div>
                                    
                                    <!--Share email-->
                                    <div class="col-sm-6">
                                        <div class='form-group  c-form-group'>
                                            <div class='c-flex'>
                                                <input style="margin-top: 0.4rem;" value='1' id="share_email" name="share_email" type="checkbox">
                                                <p class='custom-label2 c-term'>
                                                    <span class='custom-label2' style="margin:0;">Share Email</span>
                                                    <br />
                                                    Click to share your email on your profile for other user that searched for you on this platform can review.
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                        if(@$row['share_email']==1){
                                            echo "<script>document.getElementById('share_email').checked = true;</script>";
                                        }
                                        ?>
                                    </div>
                                    
                                    <!--Share Number-->
                                    <div class="col-sm-6">
                                        <div class='form-group  c-form-group'>
                                            <div class='c-flex'>
                                                <input style="margin-top: 0.4rem;" value='1' id="share_mobile" name="share_mobile" type="checkbox">
                                                <p class='custom-label2 c-term'>
                                                    <span class='custom-label2' style="margin:0;">Share Mobile Number</span>
                                                    <br />
                                                    Click to share your Mobile Number on your profile for other user that searched for you on this platform can review.
                                                </p>
                                            </div>
                                        </div>
                                        <?php 
                                        if(@$row['share_mobile']==1){
                                            echo "<script>document.getElementById('share_mobile').checked = true;</script>";
                                        }
                                        ?>
                                    </div>
                                    
                                    <!--Share Confirmations-->
                                    <div class="col-sm-6">
                                        <div class='form-group  c-form-group'>
                                            <div class='c-flex'>
                                                <input style="margin-top: 0.4rem;" value='1' id="share_confirmation" name="share_confirmation" type="checkbox">
                                                <p class='custom-label2 c-term'>
                                                    <span class='custom-label2' style="margin:0;">Share Confirmations</span>
                                                    <br />
                                                    Click to share your confirmations on your profile for other user that searched for you on this platform can review.
                                                </p>
                                            </div>
                                        </div>
                                        <?php
                                        if(@$row['share_confirmation']==1){
                                            echo "<script>document.getElementById('share_confirmation').checked = true;</script>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div style='border-bottom: none;' class='form-group c-form-group'>
                                    <button type='submit' class='btn btn-primary submitBtn'>Update</button>
                                </div>
                            </form>
                        </div>
                        
                        <!--View Profile-->
                        <div class="tab-pane fade custom-pad" id="view-profile" role="tabpanel" aria-labelledby="pills-view-profile">
                            <hr style=' margin: 0 0 1rem 0;'>
                            <div style="margin:0 1.55rem; text-align:center;">
                                <img style="width:10rem; height:10rem; border-radius:50%; margin-bottom:1rem; " src="<?=base_url(@$row['profile_picture'])?>" class=" mr-5"/>
                                <h5 class="user-details" style="font-size:1.12rem;text-align:center; margin-bottom:2rem;"><?=@$row['name']?></h5>
                                <?php
                                    if(@$row['share_email']==1){
                                        echo '<h5 class="user-details">Email - <span class="details">'.@$row['email'].'</span></h5>';
                                    }
                                    if(@$row['share_mobile']==1){
                                        echo '<h5 class="user-details">Number - <span class="details">'.@$row['phone'].'</span></h5>';
                                    }
                                    if(@$row['share_wallet']==1){
                                        echo '<h5 class="user-details">Wallet Address - <span class="details">'.@$row['wallet'].'</span></h5>';
                                    }
                                    if(@$row['share_confirmation']==1){    
                                        echo '<h5 class="user-details">Confirmations - <span class="details">'.@$confirmation.'</span></h5>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>
</body>
</html>
<link href="<?=base_url()?>assets/toastr.css" rel="stylesheet"/>
<script src="<?=base_url()?>assets/toastr.js"></script>
<script>
$(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST', 
            url: '<?=base_url("update-share-account")?>',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(response){ 
                //console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#fupForm')[0].reset();
                    toastr.info(response.message);
                }else{
                    toastr.info(response.message);
                    toastr.info(response.errors.errors);
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                setTimeout(function(){
                   window.location.reload(1);
                }, 1000);
            }
        });
    });
});
</script>
<script>
    $(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
    
});
</script>