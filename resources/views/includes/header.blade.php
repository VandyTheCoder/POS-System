
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/homepage" style = "margin-top: -6px">
          <img style = "margin-top: -4px" alt="Brand" src="{{asset('images/icon.png') }}">
        </a>
        <a class="navbar-brand" href="/homepage" style = "margin-left: -20px ;color: white; font-size: 26px ;font-family: 'Trebuchet MS'">
          Mart Managment
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
       
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src = "{{asset('images/stocks.png') }}">
              <span style = "background-color: red" class="badge"><?php if(!empty($notificationAll)){ echo $notificationAll; }?></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/homepage/getFood"><img style = "margin-top: -4px" src = "{{asset('images/food.png') }}"> Foods
                  <span align = 'right' style = "background-color: red" class="badge"></span>
                </a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/homepage/getGadget"><img style = "margin-top: -4px" src = "{{asset('images/tool.png') }}"> Gadgets
                  <span align = 'right' style = "background-color: red" class="badge"></span></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/homepage/getDrink"><img style = "margin-top: -4px" src = "{{asset('images/drink.png') }}"> Drinks
                  <span align = 'right' style = "background-color: red" class="badge"></span></a></li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="/homepage/getBeauty"><img style = "margin-top: -4px" src = "{{asset('images/beauty.png') }}"> Beauty Care 
                  <span align = 'right' style = "background-color: red" class="badge"></span>
                </a>
              </li>
              <li role="separator" class="divider"></li>
              <li><a href="/homepage/stockout"><img style = "margin-top: -4px" src = "{{asset('images/stockout.png') }}"> Out of Stock Product
                  <span align = 'right' style = "background-color: red" class="badge"><?php if(!empty($notificationOut)){ echo $notificationOut; }?></span></a></li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="/homepage/getExpired"><img style = "margin-top: -4px" src = "{{asset('images/expired.png') }}"> Expired Product 
                  <span align = 'right' style = "background-color: red" class="badge"><?php if(!empty($notificationExpired)){ echo $notificationExpired; }?></span>
                </a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src = "{{asset('images/member.png') }}">
            </a>
            <ul class="dropdown-menu">
              <li>
                <form action = "/homepage/searchMember" method = 'post' style = "margin-left: 5px; margin-right: 5px" class="input-group">
                    {!! csrf_field() !!}
                    <input class="awesomplete form-control" list="mylist1" required name = "mem_id" type="text" class="awesomplete form-control" placeholder="Membership's ID" style = 'margin-top: 5px'/>
                    <datalist id="mylist1">
                        <?php
                        foreach ($mem_search as $mem)
                        {
                            echo "<option>$mem->id</option>";
                        }
                        ?>
                    </datalist>
                      <span class="input-group-btn">
                        <button style = "height: 34px" class="btn btn-default" type="submit"><img style = "margin-top: -4px" src = "{{asset('images/search.png') }}"></button>
                      </span>
                  </form>
              </li>
              <li role="separator" class="divider"></li>
              
              <li><a href="/homepage/getExpiredMember"><img style = "margin-top: -4px" src = "{{asset('images/expired.png') }}"> Expired Membership</a></li>
            </ul>
          </li>

          <li><a href="#"><img src = "{{asset('images/notification.png') }}"><span style = "background-color: red" class="badge"></span></a></li>
        </ul>

        <ul style = "border-left: 1px solid #ddd" class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img style = "margin-top: -4px" src = "{{asset('images/user.png') }}"> {{ $name }}
              </a>
              <ul class="dropdown-menu">
                <li><a href="/homepage/profile"><img style = "margin-top: -4px" src = "{{asset('images/Settings.png') }}"> Edit Info</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/homepage/change"><img style = "margin-top: -4px" src = "{{asset('images/key.png') }}"> Change Password</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/homepage/logout"><img style = "margin-top: -4px" src = "{{asset('images/logout.png') }}"> Log Out</a></li>
              </ul>
          </li>
        </ul>

         <ul class="nav navbar-nav navbar-right">
          <li><a style = "height: 51.3667px; margin-top: -7px" href = "/refresh"><button class = "btn btn-primary"><img src = "{{asset('images/refresh.png')}}"></button></a></li>
          </ul>

         <form class="navbar-form navbar-right" action="/homepage/search" method = "post" style = "margin-right: -26px"> 
         {!! csrf_field() !!}
          <div class="form-group">
            <input class="awesomplete form-control" list="mylist" required name = "search" type="text" class="awesomplete form-control" placeholder="Product's Barcode"/>
            <datalist id="mylist">
              <?php
                foreach ($barcode_search as $barcode)
                {
                    echo "<option>$barcode->barcode_id</option>";
                }
                ?>
            </datalist>
          </div>
          <button type="submit" class="btn btn-default"><img src = "{{asset('images/search.png') }}"></button>
        </form>

        
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

