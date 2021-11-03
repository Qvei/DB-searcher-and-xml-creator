<? ?>
<html>
    <body class="sb-nav-fixed">
     <main style="padding-top: 100px;">
        <div class="container px-4">
            <div class="row">
              <div>
                <input class="localhost d" type="text" placeholder="host">
                <input class="dbname d" type="text" placeholder="dbname">
                <input class="username d" type="text" placeholder="username">
                <input class="pas d" type="text" placeholder="password">
                <button class="basego">base</button>
                <h3 class="h3" style="margin:20px 15px 10px 15px;">Choose DB table</h3>
                <select id="tabll" name="sx" class="sx sel">
                 <option>Enter your DB params first</option>
                </select>
              </div>
                <div class="grid-container">
                    <div class="grid-item">
                        <div>
                            <h6 class="ccc">Choose name of table cell</h6>
                            <select style="width: 100%;" id="clx" name="clx" class="clx sel"></select>
                            <table style="margin:20px 0 20px 13px;" class="onss2"></table>
                            <select style="width: 100%;" id="ss" name="ss" class="ss sel"></select>
                        </div>
                    	<table style="margin:20px 0 20px 13px;" class="onss1"></table>
                    </div>
                </div>
               <div style="width:100%;" class="card mb-4">
                <div class="card-header tabbl"></div>
                <div style="overflow-y: auto;width: 100%;" class="card-body" id="client"></div>
        	  </div>
            </div>
        </div>
    </main>     

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="scripts.js"></script>
  
    </body>
</html>
