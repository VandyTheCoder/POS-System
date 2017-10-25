<br>
<ul class="list-group">
    <li class="list-group-item active" style = "background-color: #101010">
        <p style = "text-align: center; color: white; font-size: 30px; margin-top: 18px">Menu</p>
    </li>
    <li class="list-group-item">
        <a href="/homepage/getFood"><img style = "margin-top: -4px" src = "{{asset('images/food.png') }}"> Foods</a>
    </li>
    <li class="list-group-item">
        <a href="/homepage/getGadget"><img style = "margin-top: -4px" src = "{{asset('images/tool.png') }}"> Gadgets</a>
    </li>
    <li class="list-group-item">
        <a href="/homepage/getDrink"><img style = "margin-top: -4px" src = "{{asset('images/drink.png') }}"> Drinks</a>
    </li>
    <li class="list-group-item">
        <a href="/homepage/getBeauty"><img style = "margin-top: -4px" src = "{{asset('images/beauty.png') }}"> Beauty Care
        </a>
    </li>
    <li class="list-group-item">
        <a href="/homepage/stockout"><img style = "margin-top: -4px" src = "{{asset('images/stockout.png') }}"> Out of Stock
        <span align = 'right' style = "background-color: red" class="badge"><?php if(!empty($notificationOut)){ echo $notificationOut; }?></span></a>
    </li>
    <li class="list-group-item">
        <a href="/homepage/getExpired"><img style = "margin-top: -4px" src = "{{asset('images/expired.png') }}"> Expired Product 
            <span align = 'right' style = "background-color: red" class="badge"><?php if(!empty($notificationExpired)){ echo $notificationExpired; }?></span>
        </a>
    </li>
</ul>

<hr style = "border: 1px solid #ddd">