<?php
$url = 'http://test.localfeedbackloop.com/api?apiKey=61067f81f8cf7e4a1f673cd230216112&noOfReviews=10&internal=1&yelp=1&google=1&offset=50&threshold=1';
$result = file_get_contents($url);
$arr = json_decode($result, true);
?>
<!DOCTYPE HTML>
<html>

<head>
  <title><?php echo $arr['business_info']['business_name']; ?></title>
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h1>Reviews</h1>
          <?php foreach($arr['reviews'] as $review): ?>
                <h4><?php echo $review['customer_name'].' '.$review['customer_last_name']; ?></h4>
                <h5>Date of Review: <?php echo date("M d, Y", strtotime($review['date_of_submission'])); ?></h5>
                <p><?php echo $review['description']; ?><br/><strong>Rating:</strong> <?php echo $review['rating']; ?></p>
           <?php endforeach ?>
      </div>
      <div id="content">
        <h1><?php echo $arr['business_info']['business_name']; ?></h1>
        <p>Address: <?php echo $arr['business_info']['business_address']; ?></p>
        <p>Phone: <?php echo $arr['business_info']['business_phone']; ?></p>
        <p>Rating: <?php echo $arr['business_info']['total_rating']['total_avg_rating']; ?></p>
        <p>Reviews: <?php echo $arr['business_info']['total_rating']['total_no_of_reviews']; ?></p>
        <p>Review Link: <a href="<?php echo $arr['business_info']['external_url']; ?>">Post Review</a></p>
        <p>Page Link: <a href="<?php echo $arr['business_info']['external_page_url']; ?>"><?php echo $arr['business_info']['external_page_url']; ?></a></p>
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; <a href="#">Code</a></p>
    </div>
  </div>
</body>
</html>
