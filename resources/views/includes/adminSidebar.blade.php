<style>
    .sidebar ul.nav a:hover, .sidebar ul.nav li.parent ul li a:hover
    {
        background-color: white;
    }
    .sidebar ul.nav ul.children li a
    {
        background-color: #222;
    }
    .notHover
    {
        position: fixed;
        bottom: 0;
    }
</style>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style = "background-color: #222">
    <form role="search" action = "/homepage/search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class="active">
            <a href="/admin/getAllProducts"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard
            </a>
        </li>

        <li class="parent">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-0"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Report</span>
            </a>
            <ul class="children collapse" id="sub-item-0" >
                <li>
                    <a class="" href="/homepage/stockout">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Out of Stock Product
                    </a>
                </li>
                <li>
                    <a class="" href="/homepage/getExpired">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Expired Product
                    </a>
                </li>
                <li>
                    <a class="" href="/homepage/getExpiredMember">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Expired Membership
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Employee Feedback
                    </a>
                </li>
            </ul>
        </li>


        <li>
            <a href="/admin/datamining"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Data Mining
            </a>
        </li>
        <li class="parent">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Products</span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="/homepage/getFood">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Food
                    </a>
                </li>
                <li>
                    <a class="" href="/homepage/getGadget">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Gadget
                    </a>
                </li>
                <li>
                    <a class="" href="/homepage/getDrink">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Drink
                    </a>
                </li>
                <li>
                    <a class="" href="/homepage/getBeauty">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Beauty
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="/admin/registration"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Registration
            </a>
        </li>

        <li>
            <a href="/admin/getTopUser"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Top User</a>
        </li>

        <li role="presentation" class="divider"></li>
        <li>
            <a href="/admin/logout"><svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg> Logout Account</a>
        </li>
        <li style = "text-align: center; background-color: #222" class = "notHover">
            <a href = "/homepage"><img src = "{{asset('images/konoha.png')}}" ></a> <br><br>® All Rights Reserved 2017
        </li>
    </ul>
</div><!--/.sidebar-->