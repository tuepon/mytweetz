<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MyTweetz</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
      <div class="navbar-header">
        <a href="/" class="navbar-brand">MyTweetz</a>
      </div>
    </div>
  </nav>

  <div class="container">
    @if(!empty($data))
      @foreach($data as $key => $tweet)
        <div class="card">
          <div class="card-body">
            <h3>{{$tweet['text']}}
              Fav {{$tweet['favorite_count']}}
              Ret {{$tweet['retweet_count']}}     
            </h3>
            @if(!empty($tweet['extended_entities']['media']))
              @foreach($tweet['extended_entities']['media'] as $i)
                <img src="{{$i['media_url_https']}}" style="width:100px;">
              @endforeach
            @endif
          </div>
        </div>
      @endforeach
    @endif
  </div>

</body>
</html>