@extends('layouts.game')

@section('content')
    @component('components.loggued')
        @component('components.card')
            @slot('title')
                {{ config('app.name') }}
            @endslot

            <div class="content elements-centered">

              <h1>
                任务
              </h1>

              <div id="content__elements">

                <h5 id="content__essai">
                  试次 1
                </h5>
                <div style="width:50%; margin: auto;">
                  <img id="element" src="{{ asset('/images/Image1.png') }}" alt="image example" class="is-centered"/> <br />
                </div>
                <div class="mt-5">
                  <button id="1" class="button m-2">1</button>
                  <button id="2" class="button m-2">2</button>
                  <button id="3" class="button m-2">3</button>
                  <button id="4" class="button m-2">4</button>
                  <button id="5" class="button m-2">5</button>
                  <button id="6" class="button m-2">6</button>
                  <button id="7" class="button m-2">7</button>
                  <button id="8" class="button m-2">8</button>
                  <button id="9" class="button m-2">9</button>
                </div>
            </div>
          </div>

          <script>

          var imageCount = 1;
          var correctResp = 0;
          var now = new Date();
          var timeResp = 0;
          var running = true;

          // Get Cookie function
          function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
              let c = ca[i];
              while (c.charAt(0) == ' ') {
                c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
              }
            }
            return "";
          }

          console.log("ACC "+ getCookie("sumScore"));
          console.log("RTS "+ getCookie("meanRTs"));
          // Response function

            function response(isResp, response, response_time){

              // Record Performance
              expires = "Thu, 30 Dec 2030 12:00:00 UTC";

              // if response
              if (isResp){

                document.cookie = 'ScoreResp' +imageCount + "=" + response + ";" + expires;
                document.cookie = 'ScoreRTs' +imageCount + "=" + response_time + ";" + expires;

              }else{

                response = "0";
                response_time = "0";

                document.cookie = 'ScoreResp' +imageCount + "=" + response + ";" + expires;
                document.cookie = 'ScoreRTs' +imageCount + "=" + response_time + ";" + expires;

              }

              // Add count to Variable
              imageCount ++;

              // Set response screen hidden
              document.getElementById("content__elements").style.visibility = "hidden";
              
              // Replace image
              document.getElementById('element').src = "/images/Image"+imageCount+".png";

              console.log(document.getElementById('element').src);
              setTimeout(function(){

                // Run again
                running = true;

                document.getElementById("content__essai").innerHTML  = "试次 " + imageCount;

                if (imageCount > 42){

                  running = false;

                  // Add mean RTs and tot accuracy Score
                  var correctResp = [2,8,1,9,7,3,9,2,4,8,6,4,6,8,1,8,7,3,9,3,9,8,9,9,1,8,1,4,2,3,8,8,1,5,2,5,4,3,8,3,6,8,];
                  var score = 0;
                  var meanRTs = 0;

                  for (var i = 0; i < 42; i++){

                    if (correctResp[i] == getCookie("ScoreResp"+i)){

                      score ++;

                    }

                    if (Number(getCookie("ScoreRTs"+i)) != 0){

                      meanRTs += Number(getCookie("ScoreRTs"+i));

                    }

                  }
                  meanRTs = Number(meanRTs) / 42;
                  // Write score in cookies
                  expires = "Thu, 30 Dec 2030 12:00:00 UTC";
                  document.cookie = 'sumScore' + "=" + score + ";" + expires;
                  document.cookie = 'meanRTs' + "=" + meanRTs + ";" + expires;
                  console.log(score)
                  console.log(meanRTs)

                  window.location.href = "instruction6";

                }else{

                  // Set response screen visible
                  document.getElementById("content__elements").style.visibility = "visible";

                  now = new Date();

                }

              }, 1000);

            }

            // Check continuously whether higher than 5000 ms
            setInterval(function(){

              // Check if running
              if (running){

                // get response time
                if ( new Date() - now > 5000){

                  // Stop setInterval function
                  running = false;

                  response(false, 0, 0);

                }

              }

            }, 100);

            var reply_click = function()
              {
                  // get response time
                  response_time = new Date() - now;

                  // Record Performance
                  expires = "Thu, 30 Dec 2030 12:00:00 UTC";

                  response(true, this.id, response_time);

              }
            document.getElementById('1').onclick = reply_click;
            document.getElementById('2').onclick = reply_click;
            document.getElementById('3').onclick = reply_click;
            document.getElementById('4').onclick = reply_click;
            document.getElementById('5').onclick = reply_click;
            document.getElementById('6').onclick = reply_click;
            document.getElementById('7').onclick = reply_click;
            document.getElementById('8').onclick = reply_click;
            document.getElementById('9').onclick = reply_click;
          </script>
    @endcomponent
  @endcomponent
@endsection
