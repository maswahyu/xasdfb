@section('inside-head')
<style>
  body.modal-show {
    overflow-y: hidden;
  }

  body.modal-show .modal {
    display: block;
  }

  .modal {
    display: none;
    position: absolute;
    width: 100%;
    height: 100%;
    overflow-y: hidden;
    background-color: rgba(0,0,0, .3);
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,.5);
    padding: 10px;
  }

  .modal .modal-dialog {
    background-color: #fff;
    width: fit-content;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  @media only screen and (max-width: 640px) {
    .modal .modal-dialog {
        background-color: #fff;
        width: fit-content;
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
  }

  .modal .modal-dialog .modal-content .modal-header button.close {
    border: none;
    cursor: pointer;
    background-color: transparent;
    font-size: 30px;
    position: absolute;
    top: 0px;
    right: 0;
    transform: translate(80%, -125%);
  }

  .modal .modal-dialog .modal-content .modal-body {
    text-align: center;
  }
</style>
@endsection

  <!-- Modal -->
  <div class="modal" id="welcomeWifi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="welcomeWifiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <a href="{{$bannerWifi->cta}}" target="_blank">
                <picture>
                    <source media="(max-width: 640px)" srcset="{{ imageview($bannerWifi->mobile_image )}}">
                    <img src="{{ imageview($bannerWifi->image )}}" alt="{{ $bannerWifi->title }}" width="100%">
                </picture>
            </a>
        </div>
      </div>
    </div>
  </div>

@section('before-body-end')
<script>
  $("body").addClass('modal-show');
  $("[data-dismiss=modal]").click( () => {
    $("body").removeClass("modal-show");
  })
  $(".modal").click((e) => {
    if($("#welcomeWifi")[0] == $(e.target)[0]) {
      $("body").removeClass("modal-show");
    }
  })
</script>
@endsection

