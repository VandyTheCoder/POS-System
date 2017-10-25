@extends('layouts.adminDefault')
@section('content')
    <style>
        .box
        {
            box-shadow: 10px 10px 5px #888888;
        }
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
        <br><br>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div style = "padding-top: 25px" class = "row">
            <div class='col-lg-3 col-md-4 col-sm-6'>
            </div>
            <div class='col-lg-6 col-md-6 col-sm-12'>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs box" role="tablist" style = "background-color: #333; border-bottom: 1px solid #ddd; border-radius: 10px 10px 0px 0px">
                    <li role="presentation" class="active"><a href="#product" aria-controls="product" role="tab" data-toggle="tab">Product</a></li>
                    <li role="presentation"><a href="#employee" aria-controls="employee" role="tab" data-toggle="tab">Employee</a></li>
                    <li role="presentation"><a href="#member" aria-controls="member" role="tab" data-toggle="tab">Membership</a></li>
                    <li role="presentation"><a href="#supplier" aria-controls="supplier" role="tab" data-toggle="tab">Supplier</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content box" style = "background-color: #666; border-radius: 0px 0px 10px 10px">
                    <div role="tabpanel" class="tab-pane active" id="product">
                        <form action = "/admin/registerProduct" method = "post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class = "row">
                                <h3 style = "text-align: center; color: white">Registration Product</h3>
                                <hr>
                                <div class = "col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span style = "border: none;background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/barcode.png')}}"></span>
                                        <input placeholder="Barcode ID" style = "border: 1px solid #ddd; width: 186px" name = "pBarcode" required type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/name.png')}}"></span>
                                        <input placeholder="Name" style = "border: 1px solid #ddd; width: 186px" name = "pName" required type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/country.png')}}"></span>

                                        <select name="pCountry" style = "border: 1px solid #ddd; width: 186px" required type="text" class="form-control" aria-describedby="basic-addon1">
                                            <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
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
                                            <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
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
                                            <option value="Cote DIvoire">Cote D'Ivoire</option>
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
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
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
                                            <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                            <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
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
                                            <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Erimates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
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
                                            <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>


                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/quantity.png')}}"></span>
                                        <input placeholder="Quantity" style = "border: 1px solid #ddd" name = "pQuantity" type="number" required class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/price.png')}}"></span>
                                        <input placeholder="Price $" style = "border: 1px solid #ddd" name = "pPrice" type="number" required class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                </div>


                                <div class = "col-lg-6 col-md-6" style = "border-left: 1px solid #ddd">
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/category.png')}}"></span>
                                        <select style = "border: 1px solid #ddd; width: 186px" name = "pCategory" required class="form-control" aria-describedby="basic-addon1">
                                            <option value = "Food">Food</option>
                                            <option value = "Gadget">Gadget</option>
                                            <option value = "Drink">Drink</option>
                                            <option value = "Beauty">Beauty</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/importDate.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px; border-radius: 0px 4px 4px 0px" class="form-control" required id="date" name="pImported_date" placeholder="YYYY-MM-DD" type="text"/>
                                        <script>
                                            $(document).ready(function(){
                                                var date_input=$('input[name="pImported_date"]'); //our date input has the name "date"
                                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                                date_input.datepicker({
                                                    format: 'yyyy-mm-dd',
                                                    container: container,
                                                    todayHighlight: true,
                                                    autoclose: true,
                                                })
                                            })
                                        </script>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/exportDate.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px; border-radius: 0px 4px 4px 0px" class="form-control" required id="date" name="pExpired_date" placeholder="YYYY-MM-DD" type="text"/>
                                        <script>
                                            $(document).ready(function(){
                                                var date_input=$('input[name="pExpired_date"]'); //our date input has the name "date"
                                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                                date_input.datepicker({
                                                    format: 'yyyy-mm-dd',
                                                    container: container,
                                                    todayHighlight: true,
                                                    autoclose: true,
                                                })
                                            })
                                        </script>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/supplier.png')}}"></span>
                                        <input placeholder="Supplier ID" style = "border: 1px solid #ddd" name = "supplier_id" type="number" required class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>

                                    <div class="input-group">

                                        <button type="button" style = "width: 235px" class="btn btn-primary" data-target=".bs-example-modal-sm" data-toggle="modal" >Upload Product Picture</button>

                                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Product Picture</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a href=\"#\" class=\"thumbnail\" style="width: 100%; height: 100%" >

                                                            <img id = 'image' style="width: 100%; height: 100%" alt = 'Profile Picture'>

                                                        </a>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <label class="btn btn-default btn-file" style="border: none; background-color: #5cb85c; color: white">
                                                            Browse Picture <input accept="image/x-png,image/gif,image/jpeg" id = "files" name = "image" type="file" required aria-describedby="basic-addon1" style="display: none;" type="file">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class = "row">
                                <div class = "col-lg-6 col-md-6">
                                    <?php
                                    if(!empty($message))
                                    {
                                        if($message == "Employee was submitted successfully!" || $message == "Product was submitted successfully!" || $message == "Membership was submitted successfully!" || $message == "Supplier was submitted successfully!")
                                        {
                                            echo "<span style = 'color: #8ad919'>$message</span>";
                                        }
                                        else
                                        {
                                            echo "<span style = 'color: red'>$message</span>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class = "col-lg-6 col-md-6" align="right">
                                    <button class = "btn btn-success" name = "submit" value = "submit" type = "submit">Submit Product</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="employee">
                        <form action = "/admin/registerEmployee" method = "post">
                            {{ csrf_field() }}
                            <div class = "row">
                                <h3 style = "color: white ;text-align: center">Registration Employee</h3>
                                <hr>
                                <div class = "col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eName.png')}}"></span>
                                        <input placeholder="Full Name" style = "border: 1px solid #ddd; width: 186px" name = "eName" required type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePosition.png')}}"></span>
                                        <select style = "border: 1px solid #ddd; width: 186px" name = "ePosition" required class="form-control" aria-describedby="basic-addon1">
                                            <option value = "Clerk">Clerk</option>
                                            <option value = "Admin">Admin</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eGender.png')}}"></span>
                                        <select style = "border: 1px solid #ddd; width: 186px" name = "eGender" required class="form-control" aria-describedby="basic-addon1">
                                            <option value = "Male">Male</option>
                                            <option value = "Female">Female</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eDOB.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px" class="form-control" required id="date" name="dob" placeholder="YYYY-MM-DD" type="text"/>
                                    </div>

                                    <br>
                                </div>


                                <div class = "col-lg-6 col-md-6" style = "border-left: 1px solid #ddd">
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eEmail.png')}}"></span>
                                        <input placeholder="Email" style = "border: 1px solid #ddd; width: 186px" value="" name = "eEmail" required type="email" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePhone.png')}}"></span>
                                        <input placeholder="Phone Number" style = "border: 1px solid #ddd; width: 186px" name = "ePhone" required type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePassword.png')}}"></span>
                                        <input placeholder="Password" style = "border: 1px solid #ddd; width: 186px" value ="" name = "ePassword" required type="password" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePassword.png')}}"></span>
                                        <input placeholder="Confirm Password" style = "border: 1px solid #ddd; width: 186px" name = "eConfirm" required type="password" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <hr>
                            <div class = "row">
                                <div class = "col-lg-6 col-md-6">
                                    <?php
                                    if(!empty($message))
                                    {
                                        if($message == "Employee was submitted successfully!" || $message == "Product was submitted successfully!" || $message == "Membership was submitted successfully!" || $message == "Supplier was submitted successfully!")
                                        {
                                            echo "<span style = 'color: #8ad919'>$message</span>";
                                        }
                                        else
                                        {
                                            echo "<span style = 'color: red'>$message</span>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class = "col-lg-6 col-md-6" align="right">
                                    <button class = "btn btn-success" name = "submit" value = "submit" type = "submit">Submit Employee</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="member">
                        <form action = "/admin/registerMember" method = "post">
                            {{ csrf_field() }}
                            <div class = "row">
                                <h3 style = "color: white;text-align: center">Registration Membership</h3>
                                <hr>
                                <div class = "col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eName.png')}}"></span>
                                        <input placeholder="Full Name" style = "border: 1px solid #ddd; width: 186px" name = "mName" required type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/importDate.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px; border-radius: 0px 4px 4px 0px" class="form-control" required id="date" name="mCreated_date" placeholder="YYYY-MM-DD" type="text"/>
                                        <script>
                                            $(document).ready(function(){
                                                var date_input=$('input[name="mCreated_date"]'); //our date input has the name "date"
                                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                                date_input.datepicker({
                                                    format: 'yyyy-mm-dd',
                                                    container: container,
                                                    todayHighlight: true,
                                                    autoclose: true,
                                                })
                                            })
                                        </script>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "border: none; background-color: #5cb85c; width: 50px; text-align: left" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/exportDate.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px; border-radius: 0px 4px 4px 0px" class="form-control" required id="date" name="mExpired_date" placeholder="YYYY-MM-DD" type="text"/>
                                        <script>
                                            $(document).ready(function(){
                                                var date_input=$('input[name="mExpired_date"]'); //our date input has the name "date"
                                                var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                                date_input.datepicker({
                                                    format: 'yyyy-mm-dd',
                                                    container: container,
                                                    todayHighlight: true,
                                                    autoclose: true,
                                                })
                                            })
                                        </script>
                                    </div>
                                    <br>

                                </div>

                                <div class = "col-lg-6 col-md-6" style = "border-left: 1px solid #ddd">
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eEmail.png')}}"></span>
                                        <input placeholder="Email" style = "border: 1px solid #ddd; width: 186px" name = "mEmail" required type="email" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePhone.png')}}"></span>
                                        <input placeholder="Phone Number" style = "border: 1px solid #ddd; width: 186px" name = "mPhone" required type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/discount.png')}}"></span>
                                        <input placeholder="Discount Percentage" style = "border: 1px solid #ddd; width: 186px" value="" name = "mDiscount" required type="number" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <hr>
                            <div class = "row">
                                <div class = "col-lg-6 col-md-6">
                                    <?php
                                    if(!empty($message))
                                    {
                                        if($message == "Employee was submitted successfully!" || $message == "Product was submitted successfully!" || $message == "Membership was submitted successfully!" || $message == "Supplier was submitted successfully!")
                                        {
                                            echo "<span style = 'color: #8ad919'>$message</span>";
                                        }
                                        else
                                        {
                                            echo "<span style = 'color: red'>$message</span>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class = "col-lg-6 col-md-6" align="right">
                                    <button class = "btn btn-success" name = "submit" value = "submit" type = "submit">Submit Member</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="supplier">
                        <form action = "/admin/registerSupplier" method = "post">
                            {{ csrf_field() }}
                            <div class = "row">
                                <h3 style = "color: white;text-align: center">Registration Supplier</h3>
                                <hr>
                                <div class = "col-lg-3 col-md-3">
                                </div>
                                <div class = "col-lg-6 col-md-6">
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eName.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px" name = "sName" required type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Name">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/eEmail.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px" name = "sEmail" required type="email" class="form-control" aria-describedby="basic-addon1"  placeholder="Email">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span style = "width: 50px; text-align: left; background-color: #5cb85c; border: none" class="input-group-addon" id="basic-addon1"><img src = "{{asset('images/ePhone.png')}}"></span>
                                        <input style = "border: 1px solid #ddd; width: 186px" name = "sPhone" required type="text" class="form-control" aria-describedby="basic-addon1"  placeholder="Phone Number">
                                    </div>
                                    <br>
                                </div>
                                <div class = "col-lg-3 col-md-3">
                                </div>
                            </div>
                            <hr>
                            <div class = "row">
                                <div class = "col-lg-6 col-md-6">
                                    <?php
                                    if(!empty($message))
                                    {
                                        if($message == "Employee was submitted successfully!" || $message == "Product was submitted successfully!" || $message == "Membership was submitted successfully!" || $message == "Supplier was submitted successfully!")
                                        {
                                            echo "<span style = 'color: #8ad919'>$message</span>";
                                        }
                                        else
                                        {
                                            echo "<span style = 'color: red'>$message</span>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class = "col-lg-6 col-md-6" align="right">
                                    <button class = "btn btn-success" name = "submit" value = "submit" type = "submit">Submit Member</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-lg-3 col-md-4 col-sm-6'>
            </div>
        </div>
        <script>
            $('#myTabs a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
        </script>
        <script>
            document.getElementById("files").onchange = function () {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("image").src = e.target.result;
                };

                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            };

        </script>


    </div>
@stop