@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

<!-- <div class="container-fluid ml-0 row justify-content-center align-items-center bg-light">
    @if ($discussion -> id)
    <div class="col-sm-9 list-group-item list-group-item-action border d-block gap-3 py-3 bg-white mb-2">
        <div class="d-block justify-content-center overflow-hidden mb-2" style="max-height: 40vh;">
            @if ($discussion-> files )
                <img src="{{ '/storage/images/discussion/'.$discussion->id.'/'.$discussion->files }}" alt="twbs" width="100%" class="flex-shrink-0 shadow-sm mr-3 my-1">
            @else
                <img src="/images/-min.jpg" alt="twbs" width="100%"  class="rounded flex-shrink-0 shadow-sm p-1">
            @endif
        </div>
        <div class="container d-flex flex-row-reverse align-items-center">
            <a href="{{ route('discussion')}}">
                <button class="btn btn-primary  btn-sm ml-2"> <i class="fa fa-arrow-left pr-1" aria-hidden="true"></i> Back</button>
            </a>
            @if (($discussion -> date) > Carbon\Carbon::now())
                <nav class="mb-0 opacity-75 mx-1 my-1 text-info">upcoming</nav>
                @auth
                    @if (!$discussion->participatedBy(auth()->user()))
                        <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                        @csrf
                            <button type="submit" class="btn btn-muted border text-info fw-bold btn-sm">register</button>
                        </form>
                    @endif
                @endauth
            @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                (Carbon\Carbon::now() )->toTimeString() >= $discussion -> start_time && 
                $discussion -> end_time  > (Carbon\Carbon::now())->toTimeString() ))

                @auth
                    @if (!$discussion->participatedBy(auth()->user()))
                        <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                        @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">register live</button>
                        </form>
                    @else
                        <a class="btn btn-success btn-sm" href="/{{ $discussion->link }}" target="_blank">Join live</a>
                        
                    @endif
                @endauth
            @elseif (Carbon\Carbon::now() > ($discussion -> date))
                <nav class="mb-0 opacity-75 my-1 text-black"><small>past-meeting</small></nav>
            @elseif (($discussion -> date) > Carbon\Carbon::now() && $discussion -> start_time > (Carbon\Carbon::now())->toTimeString() )
                <nav class="mb-0 opacity-75 my-1 text-black"><small>upcoming</small></nav>
                @auth
                    @if (!$discussion->participatedBy(auth()->user()))
                        <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                        @csrf
                            <button type="submit" class="btn btn-primary btn-sm">register</button>
                        </form>
                    @endif
                @endauth
            @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                $discussion -> start_time  > (Carbon\Carbon::now())->toTimeString()) )
                <nav class="opacity-75 my-1 text-black"><small>upcoming</small></nav>
                @auth
                    @if (!$discussion->participatedBy(auth()->user()))
                        <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                        @csrf
                            <button type="submit" class="btn btn-secondary">register</button>
                        </form>
                    @else
                        <form action="" method="get" class="">
                        @csrf
                            <button type="submit"class="btn btn-success">Join</button>
                        </form>
                    @endif
                @endauth
            
            @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && 
                (Carbon\Carbon::now()) ->toTimeString() > $discussion -> end_time )
                <nav class="mb-0 opacity-75 my-1 text-black"><small>past-meeting</small></nav>
            
            @else
                <nav class="mb-0 opacity-75 my-1 text-black"><small>past-meeting</small></nav>
            @endif
        </div>


        <h5 class="mb-1 pt-4 m-0">{{$discussion-> title}} </h5>
        <small class="text-muted m-0 p-0">By- {{ $discussion-> user->name }}</small>
        <div class="d-flex gap-2 w-100 justify-content-between pb-2 border-bottom">
            <div>
                @if ($discussion->category === '1' )
                    <img src="/images/icon/Plan2.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                @elseif ($discussion->category === '2' )
                    <img src="/images/icon/Plan4.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                @else
                    <img src="/images/icon/Plan7.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                @endif
                    <small style="font-size:14px" class="opacity-100 text-nowrap"><i class="fa fa-calendar fa-1x fw-light"></i> Meeting: {{ $discussion-> date }}</small>   
            </div>
            <div class="d-flex justify-content-between align-items-center px-0 pt-0">
                <div class="text-center align-items-center">
                    <div >
                        <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j"></div>
                        </div>
                        
                    </div>
            </div>
        </div>

        <div class="mt-3 pt-2">
            <div class="list-discussion">
                @if ($discussion-> count())
                    <div href="" class="d-col gap-3 d-flex justify-content-between pt-0" aria-current="true">
                        <nav class="opacity-100 text-nowrap py-1"><strong>Country</strong></nav>
                        <nav class="opacity-100 text-nowrap py-1">{{ $discussion-> location}}</nav>
                    </div>
                    <div href="" class="d-col gap-3 d-flex justify-content-between pt-0" aria-current="true">
                        <nav class="opacity-100 text-nowrap py-1"><strong>admin</strong></nav>
                        <nav>{{ $discussion-> admin_1}}</nav>
                    </div>
                    <div href="" class="d-col gap-3 d-flex justify-content-between pt-0" aria-current="true">
                        <nav class="opacity-100 text-nowrap py-1"><i class="fa fa-time"></i><strong>Time</strong> </nav>
                        <nav>From {{ $discussion-> start_time}} To {{ $discussion-> end_time}}</nav>
                    </div>
                    
                @endif
                <div class="pt-3">
                    @if (sizeof($topics) > 0 )
                        <nav class="opacity-100 text-muted py-0"><i class="fa fa-external-link pr-1"></i> Read the ressources related to the topic <br>
                            <a class="py-1" href="{{ route('topics.details', [$topics[0]-> id]) }}">{{ $topics[0] -> topic}}</a>
                        </nav>
                    @endif
                </div>
            </div>
            <div class="row my-1 py-2"></div> 
        </div>
    </div>
    @endif  
</div>  -->






  <style type='text/css'>
    href>a {
      text-decoration: none
    }
    body {
      margin: 0px;
      padding: 0px;
      font-family: 'Helvetica', 'Arial', sans-serif;
    }
    a {
      text-decoration: none;
      color: #4E83BF;
    }
    .small {
      font-size: 12px;
    }
  </style>

<body> 
  <table width='100%' style='font-size: 14px; font-weight: 300; color: #4A4A4A;'>
    <tr>
      <td colspan='3' align='center' style='background-color: #F4F4F4; padding: 28px 0 20px 0;'>
        
        <h1 class="mb-2">{{ $discussion-> title }}</h1>
        <br>
        <table align=center cellpadding=0 cellspacing=0>
          <tr>
            <td>
              <tb>
                <!-- <a href='[ROOMLINK]' class="btn" style='color: #FFFFFF; background-color: #83C36D;'> Join the meeting  </a> -->
              
                @if (($discussion -> date) > Carbon\Carbon::now() && $discussion -> start_time > (Carbon\Carbon::now())->toTimeString())
                    <!-- <span class='small' style="color: #83C36D;">Upcoming</span> -->
                    @auth
                        @if (!$discussion->participatedBy(auth()->user()))
                            <div class="btn btn-primary" id="link">Register to Discussion</div>
                        @endif
                    @endauth
                @endif
               

                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Do you want to register to the meeting</p>
                      </div>
                      <div class="modal-footer">
                          <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                          @csrf
                              <button type="submit" class="btn btn-primary">Register</button>
                          </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                        </div>
                    </div>
                </div>
              </b>
            </td>
          </tr>
        </table>
        <p style='margin: 10px 0 1px 0'><span class='small'>Meeting link: <a href='{{ $discussion-> link }}'>{{ $discussion-> link }}</a></span></p>
        <p style='margin: 0px 0 0px 0'>
          @auth
              @if ($discussion->participatedBy(auth()->user()))
                <span class='small'>Registered</span>
              @endif
          @endauth
            
        </p>
        
      </td>
    </tr>
    <tr>
      <td valign='middle' align='center' colspan='3'>
        <table style='padding: 16px'>
          <tr>
            <!--[if !mso]><!-- -->
            <td align='center' style='font-size: 14px; font-weight: 300; color: #4A4A4A;'>
              @if ($discussion-> user->image)
                  <div style='width: 50px; height: 50px; border-radius: 50%; background-image:url("{{ "/storage/images/".$discussion-> user->id."/".$discussion->user->image}}"); background-position: center; background-repeat: no-repeat; background-size: contain'>
                      <div style='width: 50px; height: 50px; border-radius: 50%; background:url(data:image/png;base64,[AVATAR]); background-position: center; background-repeat: no-repeat; background-size: contain'></div>
                  </div>
              @else
                  <div style='width: 50px; height: 50px; border: 1px solid #797C84; border-radius: 50%; background-image:url("/images/cxc.jpg"); background-position: center; background-repeat: no-repeat; background-size: contain'>
                      <div style='width: 50px; height: 50px; border-radius: 50%; background:url(data:image/png;base64,[AVATAR]); background-position: center; background-repeat: no-repeat; background-size: contain'></div>
                  </div>
              @endif
            </td>
            <td width=4></td>
            <!--<![endif]-->
            <td align='center' style='font-size: 14px; font-weight: 300; color: #4A4A4A;'>
              <div style='line-height: 1.4em'>
                <!--[if !mso]><!-- -->
                <p style='text-align: left'>
                  <!--<![endif]--><span>Meeting organizer:</span><br><span style='font-size: 13px; color: #83C36D;'>{{ $discussion-> user->name }}</span>
                  <!--[if !mso]><!-- -->
                </p>
                <!--<![endif]-->
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td valign='middle' align='center' colspan='3'>
        <table>
          <tr>
            <td valign='middle'></td>
            <td valign='middle' style='font-size: 14px; font-weight: 300; color: #666666  ;'><span style='vertical-align: middle'>Join meeting after registered and when the meeting start.</span></td>
          </tr>
        </table> <br></td>
    </tr>
    <tr >
      <td valign='middle' align='center' colspan='3'>
        <table>
          <tr>
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j"></div>
            </div>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width='50%' valign='middle' align='right' style='border-right: 1px solid #979797; padding: 16px'>
        <table>
          <tr>
            <td align='center' style='font-size: 14px; font-weight: 300; color: #4A4A4A;'>
              <div style='line-height: 1.4em'><span><b>TIME ZONE</b></span><br><a href='tel:[DIALIN_NUMBER],[EXTENSION_ONLY]' style='font-size: 16px; text-decoration: none; color: #4A4A4A'> {{ $discussion-> location}}</a><br>
                  
              
              
            @if (($discussion -> date) > Carbon\Carbon::now())
              <span class='small' style="color: #83C36D;">Upcoming</span>
              @auth
                  @if (!$discussion->participatedBy(auth()->user()))
                      <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                      @csrf
                          <button type="submit" class="btn btn-muted border text-info fw-bold btn-sm">register</button>
                      </form>
                  @endif
              @endauth
            @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                (Carbon\Carbon::now() )->toTimeString() >= $discussion -> start_time && 
                $discussion -> end_time  > (Carbon\Carbon::now())->toTimeString() ))
                <!-- If ongoing or live -->
                @auth
                    @if (!$discussion->participatedBy(auth()->user()))
                        <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                        @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">register live</button>
                        </form>
                    @else
                        <a class="btn btn-success btn-sm" href="/{{ $discussion->link }}" target="_blank">Join live</a>
                    @endif
                @endauth
            @elseif (Carbon\Carbon::now() > ($discussion -> date))
              <span class='small'  style="color: rgb(252, 16, 16);">Past-meeting</span>
            @elseif (($discussion -> date) > Carbon\Carbon::now() && $discussion -> start_time > (Carbon\Carbon::now())->toTimeString() )
              <span class='small' style="color: #83C36D;">Upcoming</span>
              @auth
                  @if (!$discussion->participatedBy(auth()->user()))
                      <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                      @csrf
                          <button type="submit" class="btn btn-primary btn-sm">register</button>
                      </form>
                  @endif
              @endauth
            @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                $discussion -> start_time  > (Carbon\Carbon::now())->toTimeString()) )
                <span class='small' style="color: #83C36D;">Upcoming</span>
                @auth
                    @if (!$discussion->participatedBy(auth()->user()))
                        <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                        @csrf
                            <button type="submit" class="btn btn-secondary">register</button>
                        </form>
                    @else
                        <form action="" method="get" class="">
                        @csrf
                            <button type="submit"class="btn btn-success">Join</button>
                        </form>
                    @endif
                @endauth
            
            @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && 
                (Carbon\Carbon::now()) ->toTimeString() > $discussion -> end_time )
                <span class='small' style="color: rgb(252, 16, 16);">Past-meeting</span>
            @else
              <span class='small' style="color: rgb(252, 16, 16);">MyModal1</span>
            @endif
                
              </div>
            </td>
          </tr>
        </table>
      </td>
      <td width='50%' valign='middle' align='left' style='padding: 16px'>
        <table>
          <tr>
            <td align='center' style='font-size: 14px; font-weight: 300; color: #4A4A4A;'>
              <div style='line-height: 1.4em'><span><b>MEETING {{ $discussion-> date}}</b></span><br><a href='tel:[DIALIN_NUMBER],[EXTENSION_ONLY]' style='font-size: 16px; text-decoration: none; color: #4A4A4A'>FROM {{ $discussion-> start_time}}</a><br><span class='small'> TO {{ $discussion-> end_time}}</span> </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td align='center' colspan='3' style='padding: 16px;'><br>
        <table>
          <tr>
            <td valign='middle'> 
              @if ($discussion->category === '1' )
                  <img src="/images/icon/Plan2.png" width='28' height='28' style='vertical-align: middle'>
              @elseif ($discussion->category === '2' )
                  <img src="/images/icon/Plan4.png" width='28' height='28' style='vertical-align: middle'>
              @else
                  <img src="/images/icon/Plan7.png" width='28' height='28' style='vertical-align: middle'>
              @endif
            </td>
            <!-- @if (sizeof($topics) > 0 )
                <nav class="opacity-100 text-muted py-0"><i class="fa fa-external-link pr-1"></i> Explore the ressources related to the topic <br>
                    <a class="py-1" href="{{ route('topics.details', [$topics[0]-> id]) }}">{{ $topics[0] -> topic}}</a>
                </nav>
            @endif -->
            <td valign='middle'> 
            Explore the ressources related to the topic <br>
              @if (sizeof($topics) > 0 )
                <span class='small'><a href="{{ route('topics.details', [$topics[0]-> id]) }}" style='font-weight: 500; text-decoration: underline; color: #666666  ; font-size: 16px'>{{ $topics[0] -> topic}}</a>
                </span> 
              @endif
            </td>
          </tr>
        </table> 
    </tr>
  </table> <br><br>
  <center> <br><br><span style='font-size: 12px; font-weight: 300; color: #4A4A4A;'>© 2022 Alliance4ai, Inc. All rights Reserved.</span></center><br><br><br>
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
