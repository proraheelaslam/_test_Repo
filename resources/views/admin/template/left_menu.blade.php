<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a <?php if (@$class == 'dashboard') {?> class="active" <?php }?> href="{{URL::to('/admin/home')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a <?php if (@$class == 'courses') {?> class="active" <?php }?> href="{{URL::to('/admin/courses')}}">
                        <i class="fa fa-building-o"></i>
                        <span>Manage Courses</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'users') {?> class="active" <?php }?> href="{{URL::to('/admin/users')}}">
                        <i class="fa fa-book"></i>
                        <span>Manage Users</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'categories') {?> class="active" <?php }?> href="{{URL::to('/admin/categories')}}">
                        <i class="fa fa-building-o"></i>
                        <span>Manage Categories</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'menu_category') {?> class="active" <?php }?> href="{{URL::to('/admin/menu_category')}}">
                        <i class="fa fa-list-alt"></i>
                        <span>Manage Menu</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'countries') {?> class="active" <?php }?> href="{{URL::to('/admin/countries')}}">
                        <i class="fa fa-flag"></i>
                        <span>Manage Countries</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'pages') {?> class="active" <?php }?> href="{{URL::to('/admin/content_pages')}}">
                        <i class="fa fa-suitcase"></i>
                        <span>Manage Pages</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'email') {?> class="active" <?php }?> href="{{URL::to('/admin/emails')}}">
                        <i class="fa fa-suitcase"></i>
                        <span>Manage Email Templates</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'orders') {?> class="active" <?php }?> href="{{URL::to('/admin/orders/all_order')}}">
                        <i class="fa fa-download "></i>
                        <span>Manage Orders</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'news_letter') {?> class="active" <?php }?> href="{{URL::to('/admin/news_letter')}}">
                        <i class="fa fa-envelope"></i>
                        <span>Manage News Letter</span>
                    </a>
                </li>
                <li >
                    <a <?php if (@$class == 'subscriber') {?> class="active" <?php }?> href="{{URL::to('/admin/subscriber')}}">
                        <i class="fa fa-users"></i>
                        <span>Subscribers</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'faq') {?> class="active" <?php }?> href="{{URL::to('/admin/faq')}}">
                        <i class="fa fa-question-circle"></i>
                        <span>FAQ's</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'faq') {?> class="active" <?php }?> href="{{URL::to('/admin/chats')}}">
                        <i class="fa fa-comment"></i>
                        <span>Manage Chats</span>
                    </a>
                </li>
                <li>
                    <a <?php if (@$class == 'settings') {?> class="active" <?php }?> href="{{URL::to('/admin/settings')}}">
                        <i class="fa fa-suitcase"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </div>
<!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
