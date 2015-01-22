<script>
//----------facebook-----------
//FaceBook check login

// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

//FaceBook check login end

//FaceBook API jQuery
window.fbAsyncInit = function() {
    FB.init({
      appId      : '818779268172286',
      cookie	 : true,
      xfbml      : true,
      version    : 'v2.2'
    });
  };

FB.getLoginStatus(function(response) {
    statusChangeCallback(response);

    FB.ui({
      method: 'feed',
      name: '中原大學六十週年',
      link: 'http://linen-totality-802.appspot.com',
      picture: $("#photo").val(),
      caption: 'Fifi Lapin'},
      function (response) {
        if (response && response.post_id) {
          // 已經貼到塗鴉牆
        } else {
          // 沒貼到塗鴉牆
        }
      }
    );
  });

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=818779268172286&version=v2.2";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
      //FaceBook API jQuery end
      //FB initial

//FB Login
/*function parse_signed_request($signed_request) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  $secret = "2dc145a8c0470d616a7cd3ee1888d57a"; // Use your app secret here

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  // confirm the signature
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
  return base64_decode(strtr($input, '-_', '+/'));
}*/

//FB initial end

    /*FB.init({
		appId: '818779268172286', // App ID
		status: true, // check login status
		cookie: true, // enable cookies to allow the server to access the session
		oauth: true, // enable OAuth 2.0
		xfbml: true  // parse XFBML
	});
	//FB.Canvas.setAutoResize(false);
	//FB.Canvas.setSize({ height: 750, width: 760 });
	$(document).ready(function () {
		FB.getLoginStatus(function (response) {
			if (response.session) {
			//登入成功
			} else {
				FB.login(function (response) {
					if (response.session) {
						var access_token = response.session.access_token;
					} else {

					}
				});
			}
			ShowFeed();  
		});
	});
	function ShowFeed() {
		FB.ui({
			method: 'feed',
			name: '中原大學六十週年',
			link: 'http://linen-totality-802.appspot.com',
			picture: $("#CImg").val(),
			caption: 'Fifi Lapin',
			description: $("#des").val()},
			function (response) {
				if (response && response.post_id) {
					// 已經貼到塗鴉牆
				} else {
					// 沒貼到塗鴉牆
				}
			}
		);
	}*/
</script>

