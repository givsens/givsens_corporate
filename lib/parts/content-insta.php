<script src="<?php echo get_template_directory_uri(); ?>/lib/js/instafeed.min.js"></script>


<script src="https://kishiken.com/common/jq_sample/instafeed/instafeed.min.js"></script>

<script>
  $(document).ready(function() {
                var feed = new Instafeed({
                target: 'instafeed',
                get: 'user',
                userId: '2399935',
                accessToken:'2399935.cffa174.93c5d3155975447fa8f74935b0e0fdef',
                clientId: 'cffa1746841a4ffea7052980791b7171',
                links: true , 
                limit: 8, 
                resolution: 'standard_resolution', 
                template: '<div class="col-sm-3 col-xs-6 col-md-3 insta-box mb-5"><a href="{{link}}"><img src="{{image}}" target="_blank"></a></div>'
              });
              $('#btn-more').click(function() {
                feed.next();
              });
                feed.run();
              });
</script>
<script type="text/javascript">
  var loadButton = document.getElementById('btn-more');
                  var feed = new Instafeed({
                      // every time we load more, run this function
                      after: function() {
                          // disable button if no more results to load
                          if (!this.hasNext()) {
                              loadButton.setAttribute('disabled', 'disabled');
                          }
                      },
                  });
                  // bind the load more button
                  loadButton.addEventListener('click', function() {
                      feed.next();
                  });
                  // run our feed!
                  feed.run();
</script>

</style>
<div class="container">
  <div id="instafeed" class="row">
    <!--ここに一覧を表示する-->
  </div>
  <div class="text-center">
    <button id="btn-more" class="btn btn-default">もっとみる</button>
  </div>
</div>

