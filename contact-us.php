<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/head.html"; ?>
  <title>Contact Us | Reach Us at Microrent India</title>
  <meta name="description" content="Microrent India is one of the largest IT Rental Company. We are in this business from '1989'.We have our head office in Kailash Colony Delhi" />
  <!-- <link rel="canonical" href="http://microrentindia.com/contact-us/" /> -->
</head>

<body>
  <div class="container">
    <!--center shadow starts-->
    <section class="center-shadow">
      <!--header starts-->
      <header>
        <?php include "includes/nav.html"; ?>
      </header>
      <!--header ends-->
      <section id="body-container">
        <div class="row">
          <div class="col-md-12">
            <!--content starts-->
            <section class="content-container">
              <div class="row">
                <div class="col-md-9">
                  <h2 class="h1 default">Contact Us: </h2>
                  <br />
                  <h3>Head Office: </h3>
                  <h4>Microrent India <br /> D-5, Kailash Colony, New Delhi</h4>
                  <br />
                  <h3>Branch Offices: </h3>
                  <h4>Noida and Gurgaon</h4>
                  <br />
                  <div id="mapPlaceholder">
                    <img loading="lazy" src="https://res.cloudinary.com/wamp-infotech/image/upload/v1601479734/map-min.jpg" />
                  <div>
                </div>
                <div class="col-sm-12 col-md-3 contact l-sep">
                  <h2 class="h1 default">Quick Query</h2>
                  <?php include "includes/query.html"; ?>
                </div>
              </div>
              <?php include "includes/contact.html"; ?>
            </section>
          </div>
        </div>
      </section>
    </section>
    <!--center shadow ends-->
    <?php include "includes/footer.html"; ?>
  </div>
  <?php include "includes/bottom.html"; ?>
  <script>
    $(document).ready(() => {
      $("#mapPlaceholder").html('<iframe allowfullscreen="" frameborder="0" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7009.084901985041!2d77.23820332682375!3d28.553469453716616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3cb05555555%3A0xbf833df171db91ea!2sMicrorent%20India!5e0!3m2!1sen!2sin!4v1596368050945!5m2!1sen!2sin" width="100%"></iframe>');
    });
    </script>
</body>

</html>