﻿
<?php
require_once WPATH . "modules/classes/Books.php";
require_once WPATH . "modules/classes/Users.php";
$users = new Users();
$books = new Books();

$code = $_GET['code'];
$book_details = $books->fetchBookDetails($code);
$publisher_details = $users->fetchPublisherDetails($book_details['publisher']);

if ($book_details['level_id'] == 1) {
    $location = 'modules/images/books/ecd/';
} else if ($book_details['level_id'] == 2) {
    $location = 'modules/images/books/primary/';
} else if ($book_details['level_id'] == 3) {
    $location = 'modules/images/books/secondary/';
} else if ($book_details['level_id'] == 4) {
    $location = 'modules/images/books/adult/';
}

require_once "core/template/header.php";
?>

<div id="mainBody">
    <div class="container">
        <div class="row">
            <?php include_once "modules/menus/main_sidebar.php"; ?>
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="?home">Home</a> <span class="divider">/</span></li>
                    <li class="active">Book Details</li>
                </ul>	
                <div class="row">	  
                    <div id="gallery" class="span3">
                        <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
                            <img src="<?php echo $location . $book_details['cover_photo']; ?>" style="width:80%" alt="<?php echo $book_details['title'] . " cover photo"; ?>"/>
                            <!--<img src="themes/images/products/large/3.jpg" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>-->
                        </a>
                        <!--                        <div id="differentview" class="moreOptopm carousel slide">
                                                    <div class="carousel-inner">
                                                        <div class="item active">
                                                            <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
                                                            <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
                                                            <a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
                                                        </div>
                                                        <div class="item">
                                                            <a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
                                                            <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
                                                            <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
                                                        </div>
                                                    </div>
                                                      
                                                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
                                                    
                                                </div>-->

                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <span class="btn"><i class="icon-envelope"></i></span>
                                <span class="btn" ><i class="icon-print"></i></span>
                                <span class="btn" ><i class="icon-zoom-in"></i></span>
                                <span class="btn" ><i class="icon-star"></i></span>
                                <span class="btn" ><i class=" icon-thumbs-up"></i></span>
                                <span class="btn" ><i class="icon-thumbs-down"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <h3><?php echo $book_details['title']; ?></h3>
                        <small>PUBLISHER - <?php echo $publisher_details['company_name']; ?></small>
                        <hr class="soft"/>
                        <form class="form-horizontal qtyFrm">
                            <div class="control-group">
                                <label class="control-label"><span> Price: <?php echo "KShs. " . $book_details['price']; ?></span></label>
                                <div class="controls">
                                    <input type="number" class="span1" placeholder="Qty."/>
                                    <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
                                </div>
                            </div>
                        </form>

                        <hr class="soft"/>
                        <h4>Description</h4>
                        <hr class="soft clr"/>
                        <p>
                            <?php echo $book_details['description']; ?>
                        </p>
                        <!--<a class="btn btn-small pull-right" href="#detail">More Details</a>-->
                        <br class="clr"/>
                        <a href="#" name="detail"></a>
                        <hr class="soft"/>
                    </div>

                    <!--                    <div class="span9">
                                            <ul id="productDetail" class="nav nav-tabs">
                                                <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
                                                <li><a href="#profile" data-toggle="tab">Related Products</a></li>
                                            </ul>
                                            <div id="myTabContent" class="tab-content">
                                                <div class="tab-pane fade active in" id="home">
                                                    <h4>Product Information</h4>
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr class="techSpecRow"><th colspan="2">Book Details</th></tr>
                                                            <tr class="techSpecRow"><td class="techSpecTD1">Title: </td><td class="techSpecTD2"> ....title name....</td></tr>
                                                            <tr class="techSpecRow"><td class="techSpecTD1">Publisher:</td><td class="techSpecTD2">....publisher name....</td></tr>
                                                            <tr class="techSpecRow"><td class="techSpecTD1">Book Type:</td><td class="techSpecTD2">....type name....</td></tr>
                                                            <tr class="techSpecRow"><td class="techSpecTD1">Book Level:</td><td class="techSpecTD2">....level name....</td></tr>
                                                        </tbody>
                                                    </table>
                    
                                                    <h5>Book Details</h5>
                                                    <p>
                                                        14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card).<br/>
                                                        OND363338
                    
                                                        With its easy to use Panoramic shooting mode you can get creative on the S2950, however basic your skills, and rest assured that you will not risk shooting uneven landscapes or shaky horizons. The camera enables you to take three successive shots with a helpful tool which automatically releases the shutter once the images are fully aligned to seamlessly stitch the shots together in-camera. It's so easy and the results are impressive.
                    
                                                        Even at the longest zoom settings or in the most challenging of lighting conditions, the S2950 is able to produce crisp, clean results. With its mechanically stabilised 1/2 3", 14 megapixel CCD sensor, and high ISO sensitivity settings, Fujifilm's Dual Image Stabilisation technology combines to reduce the blurring effects of both hand-shake and subject movement to provide superb pictures.
                                                    </p>
                                                </div>
                                                <div class="tab-pane fade" id="profile">
                                                    <div id="myTab" class="pull-right">
                                                        <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
                                                        <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
                                                    </div>
                                                    <br class="clr"/>
                                                    <hr class="soft"/>
                                                    <div class="tab-content">
                                                        <div class="tab-pane" id="listView">
                                                            <div class="row">	  
                                                                <div class="span2">
                                                                    <img src="themes/images/products/4.jpg" alt=""/>
                                                                </div>
                                                                <div class="span4">
                                                                    <h3>New | Available</h3>				
                                                                    <hr class="soft"/>
                                                                    <h5>Product Name </h5>
                                                                    <p>
                                                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                                        that is why our goods are so popular..
                                                                    </p>
                                                                    <a class="btn btn-small pull-right" href="?book_details">View Details</a>
                                                                    <br class="clr"/>
                                                                </div>
                                                                <div class="span3 alignR">
                                                                    <form class="form-horizontal qtyFrm">
                                                                        <h3> KShs. 222.00</h3>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox">  Adds product to compair
                                                                        </label><br/>
                                                                        <div class="btn-group">
                                                                            <a href="?book_details" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                                            <a href="?book_details" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr class="soft"/>
                                                            <div class="row">	  
                                                                <div class="span2">
                                                                    <img src="themes/images/products/5.jpg" alt=""/>
                                                                </div>
                                                                <div class="span4">
                                                                    <h3>New | Available</h3>				
                                                                    <hr class="soft"/>
                                                                    <h5>Product Name </h5>
                                                                    <p>
                                                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                                        that is why our goods are so popular..
                                                                    </p>
                                                                    <a class="btn btn-small pull-right" href="?book_details">View Details</a>
                                                                    <br class="clr"/>
                                                                </div>
                                                                <div class="span3 alignR">
                                                                    <form class="form-horizontal qtyFrm">
                                                                        <h3> KShs. 222.00</h3>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox">  Adds product to compair
                                                                        </label><br/>
                                                                        <div class="btn-group">
                                                                            <a href="?book_details" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                                            <a href="?book_details" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr class="soft"/>
                                                            <div class="row">	  
                                                                <div class="span2">
                                                                    <img src="themes/images/products/6.jpg" alt=""/>
                                                                </div>
                                                                <div class="span4">
                                                                    <h3>New | Available</h3>				
                                                                    <hr class="soft"/>
                                                                    <h5>Product Name </h5>
                                                                    <p>
                                                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                                        that is why our goods are so popular..
                                                                    </p>
                                                                    <a class="btn btn-small pull-right" href="?book_details">View Details</a>
                                                                    <br class="clr"/>
                                                                </div>
                                                                <div class="span3 alignR">
                                                                    <form class="form-horizontal qtyFrm">
                                                                        <h3> KShs. 222.00</h3>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox">  Adds product to compair
                                                                        </label><br/>
                                                                        <div class="btn-group">
                                                                            <a href="?book_details" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                                            <a href="?book_details" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr class="soft"/>
                                                            <div class="row">	  
                                                                <div class="span2">
                                                                    <img src="themes/images/products/7.jpg" alt=""/>
                                                                </div>
                                                                <div class="span4">
                                                                    <h3>New | Available</h3>				
                                                                    <hr class="soft"/>
                                                                    <h5>Product Name </h5>
                                                                    <p>
                                                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                                        that is why our goods are so popular..
                                                                    </p>
                                                                    <a class="btn btn-small pull-right" href="?book_details">View Details</a>
                                                                    <br class="clr"/>
                                                                </div>
                                                                <div class="span3 alignR">
                                                                    <form class="form-horizontal qtyFrm">
                                                                        <h3> KShs. 222.00</h3>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox">  Adds product to compair
                                                                        </label><br/>
                                                                        <div class="btn-group">
                                                                            <a href="?book_details" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                                            <a href="?book_details" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                    
                                                            <hr class="soft"/>
                                                            <div class="row">	  
                                                                <div class="span2">
                                                                    <img src="themes/images/products/8.jpg" alt=""/>
                                                                </div>
                                                                <div class="span4">
                                                                    <h3>New | Available</h3>				
                                                                    <hr class="soft"/>
                                                                    <h5>Product Name </h5>
                                                                    <p>
                                                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                                        that is why our goods are so popular..
                                                                    </p>
                                                                    <a class="btn btn-small pull-right" href="?book_details">View Details</a>
                                                                    <br class="clr"/>
                                                                </div>
                                                                <div class="span3 alignR">
                                                                    <form class="form-horizontal qtyFrm">
                                                                        <h3> KShs. 222.00</h3>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox">  Adds product to compair
                                                                        </label><br/>
                                                                        <div class="btn-group">
                                                                            <a href="?book_details" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                                            <a href="?book_details" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr class="soft"/>
                                                            <div class="row">	  
                                                                <div class="span2">
                                                                    <img src="themes/images/products/9.jpg" alt=""/>
                                                                </div>
                                                                <div class="span4">
                                                                    <h3>New | Available</h3>				
                                                                    <hr class="soft"/>
                                                                    <h5>Product Name </h5>
                                                                    <p>
                                                                        Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - 
                                                                        that is why our goods are so popular..
                                                                    </p>
                                                                    <a class="btn btn-small pull-right" href="?book_details">View Details</a>
                                                                    <br class="clr"/>
                                                                </div>
                                                                <div class="span3 alignR">
                                                                    <form class="form-horizontal qtyFrm">
                                                                        <h3> KShs. 222.00</h3>
                                                                        <label class="checkbox">
                                                                            <input type="checkbox">  Adds product to compair
                                                                        </label><br/>
                                                                        <div class="btn-group">
                                                                            <a href="?book_details" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
                                                                            <a href="?book_details" class="btn btn-large"><i class="icon-zoom-in"></i></a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <hr class="soft"/>
                                                        </div>
                                                        <div class="tab-pane active" id="blockView">
                                                            <ul class="thumbnails">
                                                                <li class="span3">
                                                                    <div class="thumbnail">
                                                                        <a href="?book_details"><img src="themes/images/products/10.jpg" alt=""/></a>
                                                                        <div class="caption">
                                                                            <h5>Manicure &amp; Pedicure</h5>
                                                                            <p> 
                                                                                Lorem Ipsum is simply dummy text. 
                                                                            </p>
                                                                            <h4 style="text-align:center"><a class="btn" href="?book_details"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> KShs. 222.00</a></h4>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="span3">
                                                                    <div class="thumbnail">
                                                                        <a href="?book_details"><img src="themes/images/products/11.jpg" alt=""/></a>
                                                                        <div class="caption">
                                                                            <h5>Manicure &amp; Pedicure</h5>
                                                                            <p> 
                                                                                Lorem Ipsum is simply dummy text. 
                                                                            </p>
                                                                            <h4 style="text-align:center"><a class="btn" href="?book_details"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> KShs. 222.00</a></h4>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="span3">
                                                                    <div class="thumbnail">
                                                                        <a href="?book_details"><img src="themes/images/products/12.jpg" alt=""/></a>
                                                                        <div class="caption">
                                                                            <h5>Manicure &amp; Pedicure</h5>
                                                                            <p> 
                                                                                Lorem Ipsum is simply dummy text. 
                                                                            </p>
                                                                            <h4 style="text-align:center"><a class="btn" href="?book_details"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> KShs. 222.00</a></h4>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="span3">
                                                                    <div class="thumbnail">
                                                                        <a href="?book_details"><img src="themes/images/products/13.jpg" alt=""/></a>
                                                                        <div class="caption">
                                                                            <h5>Manicure &amp; Pedicure</h5>
                                                                            <p> 
                                                                                Lorem Ipsum is simply dummy text. 
                                                                            </p>
                                                                            <h4 style="text-align:center"><a class="btn" href="?book_details"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> KShs. 222.00</a></h4>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="span3">
                                                                    <div class="thumbnail">
                                                                        <a href="?book_details"><img src="themes/images/products/1.jpg" alt=""/></a>
                                                                        <div class="caption">
                                                                            <h5>Manicure &amp; Pedicure</h5>
                                                                            <p> 
                                                                                Lorem Ipsum is simply dummy text. 
                                                                            </p>
                                                                            <h4 style="text-align:center"><a class="btn" href="?book_details"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> KShs. 222.00</a></h4>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="span3">
                                                                    <div class="thumbnail">
                                                                        <a href="?book_details"><img src="themes/images/products/2.jpg" alt=""/></a>
                                                                        <div class="caption">
                                                                            <h5>Manicure &amp; Pedicure</h5>
                                                                            <p> 
                                                                                Lorem Ipsum is simply dummy text. 
                                                                            </p>
                                                                            <h4 style="text-align:center"><a class="btn" href="?book_details"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"> KShs. 222.00</a></h4>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <hr class="soft"/>
                                                        </div>
                                                    </div>
                                                    <br class="clr">
                                                </div>
                                            </div>
                                        </div>-->

                    <a href="?home" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
                    <a href="?checkout" class="btn btn-large pull-right">Proceed to Checkout <i class="icon-arrow-right"></i></a>
                                    <!--<input class="btn btn-large pull-right" type="submit" value="Proceed to Checkout" />-->

                </div>
            </div>
        </div>
    </div>
</div>
