@extends('frontend.layouts.skeleton')

@section('inside-head')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@endsection

@section('vue-app')
{{-- Variable for hide Content Primary --}}
@php
$contentClass = 'd-none'
@endphp
{{-- Chat APP container --}}
<div id="chat-app" class="bg-content">
  <div class="container py-app">
    <div class="row">
      <div class="stream__video">
        <div class="stream__video__inner">
          <iframe src="https://www.youtube.com/embed/{{ $stream->getYoutubeVideoId() }}?autoplay=1&controls=1&modestbranding=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="stream__video__desc" :class="{ 'more' : showMore }" @click.prevent="showMore = !showMore">
          <span class="btn-more">
            <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2.53803 0L0 2.53803L8 10.538L16 2.53803L13.462 0L8 5.46197L2.53803 0Z" fill="#9B9B9B"/>
            </svg>
          </span>
          <div class="stream__video__caption">
            <h4 class="title__video">{{ $stream->name }}</h4>
            <span class="subtitle__video">LIVE PADA {{ $stream->event_date }}</span>
          </div>
          <div class="stream__video__subs">
            <button
              @click="showReminder"
              class="btn btn-crimson btn-subs"
            >
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                  <path d="M20.7608 6.52931L22.1082 6.12694C21.3553 3.60577 19.6935 1.46569 17.429 0.100922L16.7031 1.30537C18.6672 2.48902 20.1083 4.34428 20.7608 6.52931Z" fill="white"/>
                  <path d="M7.29689 1.30533L6.57104 0.100922C4.30646 1.46569 2.64469 3.60577 1.89178 6.12694L3.23921 6.52931C3.89175 4.34428 5.33279 2.48902 7.29689 1.30533Z" fill="white"/>
                  <path d="M4.26562 9.14062V16.6775C4.26562 17.1309 4.08905 17.5572 3.76847 17.8778C3.18225 18.464 2.85938 19.2435 2.85938 20.0725V21.1875H8.55511C8.88173 22.7903 10.3022 24 12 24C13.6978 24 15.1182 22.7903 15.4449 21.1875H21.1406V20.0725C21.1406 19.2434 20.8177 18.464 20.2315 17.8778C19.9109 17.5572 19.7344 17.1309 19.7344 16.6775V9.14062C19.7344 5.11294 16.6395 1.79503 12.7031 1.43855V0H11.2969V1.43855C7.36045 1.79498 4.26562 5.11289 4.26562 9.14062ZM12 22.5938C11.0834 22.5938 10.3018 22.0059 10.0116 21.187H13.9884C13.6982 22.0059 12.9166 22.5938 12 22.5938ZM18.3281 9.14062V16.6775C18.3281 17.5066 18.651 18.286 19.2372 18.8722C19.4881 19.1231 19.6507 19.4386 19.7097 19.7812H4.29037C4.34925 19.4386 4.51195 19.123 4.76283 18.8722C5.349 18.286 5.67188 17.5065 5.67188 16.6775V9.14062C5.67188 5.6513 8.51067 2.8125 12 2.8125C15.4893 2.8125 18.3281 5.6513 18.3281 9.14062Z" fill="white"/>
                </g>
                <defs>
                  <clipPath id="clip0">
                    <rect width="24" height="24" fill="white"/>
                  </clipPath>
                </defs>
              </svg>
              Atur Pengingat
            </button>
          </div>
        </div>
      </div>
      <div class="stream__chat">
        <div class="stream__chat__header">
          <span>Live Chat</span>
        </div>
        <div class="stream__chat__body">
          {{-- Before Login --}}
          <div class="screen-chat screen-chat--center screen-chat--white">
            <div class="login-bar">
              <p class="mb-3">Kamu belum login untuk memulai chat</p>
              <a href="{{ url('member/login') }}" class="button button-carrot">Login</a>
              <span>Atau</span>
              <button
                class="button button-black"
                @click="loginGuest"
              >
                Login Sebagai Tamu
              </button>
            </div>
          </div>
          {{-- Form Login --}}
          <transition
            name="fadeUp"
            mode="out-in"
          >
            <div
              v-if="showGuestForm"
              class="screen-chat screen-chat--white p-20 form__login"
              :class="{'screen-chat--active': showGuestForm }"
            >
              <div class="form-login">
                <h4 class="mb-3">Chat Sebagai Tamu</h4>
                <p>
                  Kamu akan masuk sebagai guest di dalam live chat ini. Untuk melanjutkan, silahkan lengkapi data dirimu.
                </p>
                <div class="form-holder">
                  <div class="mb-3">
                    <label for="email" class="label-form">Nama</label>
                    <input type="text" name="email" class="input-form" placeholder="Ketik nama-mu disini" v-model="guest.name">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="label-form">Nomor Handphone</label>
                    <input type="text" name="email" class="input-form" placeholder="Ketik nomor handphone-mu disini" v-model="guest.phone">
                  </div>
                  <button
                    @click.prevent="loginProcess"
                    class="btn btn-crimson btn-send mb-2"
                  >
                    Lanjutkan
                  </button>
                  <button
                    @click.prevent="showGuestForm = false"
                    class="btn btn-white btn-cancel"
                  >
                    Batal
                  </button>
                </div>
              </div>
            </div>
          </transition>
          {{-- After login --}}
          <transition
            mode="out-in"
            name="fadeUp"
          >
            <div
              v-if="login"
              class="screen-chat screen-chat--white p-20"
              :class="{'screen-chat--center': login }"
            >
              <div class="text-center">
                <p>Silahkan klik button dibawah ini untuk masuk ke live chat stream.</p>
                <button @click="joinChat" class="btn btn-primary-outline text-uppercase">Masuk ke live chat</button>
              </div>
            </div>
          </transition>
          {{-- Chat Container --}}
          <transition
            mode="out-in"
            name="fadeUp"
          >
            <div
              ref="chatContainer"
              v-if="showChat"
              :class="{'screen-chat--active': showChat }"
              class="screen-chat screen-chat--smoke screen-chat--overflow"
            >
              <div
                v-for="chat in chats"
                :key="chat.id"
                class="chat__item"
                :class="chat.userId == userIdLog ? 'chat__item--me': null"
              >
                <div class="chat__item-img" v-if="chat.photo != '' && chat.photo != null">
                  <img :src="chat.photo" alt="user">
                </div>
                <div class="chat__item-img" :style="{ backgroundColor: randomColor(chat.userId) }" :initial="chat.name.substr(0, 2)" v-else></div>
                <div class="chat__item-content">
                  <span class="message">
                    <strong v-if="chat.userId == userIdLog">Me</strong>
                    <strong v-else>@{{ chat.name }} @{{ chat.status == 2 ? '(Tamu)': null }}</strong>
                    @{{ chat.message }}
                  </span>
                </div>
              </div>
              {{-- Greeting --}}
              <div v-if="greeting" class="greeting">
                <div class="greeting__icon">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.0354 6.50902C22.4257 5.26172 21.5294 4.20506 20.3715 3.36844C18.3189 1.88545 15.4241 1.10156 12 1.10156C8.57592 1.10156 5.68111 1.88541 3.62855 3.36844C2.47064 4.20506 1.57434 5.26172 0.964594 6.50902C0.324562 7.81833 0 9.34242 0 11.0391C0 14.7086 1.51336 17.5159 4.3882 19.2045C3.99052 20.6075 3.47452 21.4577 3.46988 21.4653L2.58005 22.896L4.26544 22.8984H4.27031C4.27514 22.8984 4.28006 22.8984 4.28527 22.8984C4.81716 22.8984 7.25742 22.7837 9.24159 20.7933C10.1163 20.915 11.0418 20.9766 12 20.9766C15.4241 20.9766 18.3189 20.1927 20.3715 18.7097C21.5294 17.873 22.4257 16.8164 23.0354 15.5691C23.6754 14.2598 24 12.7357 24 11.0391C24 9.34242 23.6754 7.81828 23.0354 6.50902ZM19.2733 17.1899C17.5424 18.4405 15.0273 19.1016 12 19.1016C10.9598 19.1016 9.96727 19.0226 9.04992 18.8668L8.52792 18.7781L8.1825 19.1794C7.44028 20.0414 6.58341 20.5017 5.856 20.7468C6.04491 20.2372 6.2362 19.6256 6.39056 18.9287L6.5497 18.2106L5.89003 17.8852C3.22584 16.5711 1.875 14.2677 1.875 11.0391C1.875 8.32486 2.83444 6.25542 4.72669 4.88827C6.45759 3.63764 8.97267 2.97656 12 2.97656C15.0273 2.97656 17.5424 3.63759 19.2733 4.88827C21.1656 6.25542 22.125 8.32491 22.125 11.0391C22.125 13.7532 21.1656 15.8227 19.2733 17.1899Z" fill="#EC2427"/>
                    <path d="M15 11.5L9.75 14.5311L9.75 8.46891L15 11.5Z" fill="#EC2427"/>
                  </svg>
                </div>
                <div class="greeting__text">
                  Selamat Datang Di Live Chat
                </div>
              </div>
            </div>
          </transition>
        </div>
        <div class="stream__chat__footer flex-center">
          <div
            v-if="showChat"
            class="chat-form"
          >
            <div class="chat-form__img">
              <img src="https://source.unsplash.com/user/erondu/800x600" alt="User">
            </div>
            <form class="chat-form__inputs" @submit="sendMessage">
              <input type="text" :maxlength="max" class="input-form" placeholder="Ketik chat kamu disini" v-model="message">
              <button class="btn btn-post">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip5)"></g>
                      <path d="M23.6498 12.0008C23.6498 11.7195 23.4821 11.4653 23.2237 11.3546L0.857066 1.76876C0.601149 1.65908 0.304662 1.71076 0.10085 1.90051C-0.102895 2.09027 -0.175451 2.38238 -0.0842349 2.64543L3.16029 12.0007L-0.0842023 21.3561C-0.172701 21.6112 -0.107106 21.8937 0.0827849 22.0835C0.0886854 22.0894 0.0947182 22.0953 0.100883 22.101C0.304597 22.2907 0.601148 22.3424 0.857033 22.2327L23.2236 12.6471C23.4821 12.5363 23.6498 12.2821 23.6498 12.0008ZM1.76585 3.68822L19.5211 11.2977L4.40487 11.2976L1.76585 3.68822ZM1.76585 20.3133L4.4049 12.7038L19.5212 12.7039L1.76585 20.3133Z" fill="#EC2427"/>
                    </g>
                    <defs>
                      <clipPath id="clip5">
                        <rect width="24" height="24" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
              </button>
            </form>
          <span class="chat-form__char"><span :style="{ color: message.length >= max ? 'red': null }">@{{ message.length > 0 ? message.length : 0 }}</span>/@{{ max }}</span>
          </div>
        </div>
        {{-- Kick Window --}}
        <transition
          mode="out-in"
          name="fade"
        >
          <div
            v-if="blocked"
            :class="{'kick-window--show': blocked }"
            class="kick-window flex-center"
          >
          <div class="kick-window__box text-center">
            <p class="mb-3">
              Kamu telah keluar dari chat karena telah diam selama @{{ (this.timer.timeout / 60) }} menit.
            </p>
            <button @click="reEnter" class="btn btn-primary-outline text-uppercase">Masuk Kembali</button>
          </div>
        </div>
        </transition>
      </div>
    </div>
  </div>
  {{-- Popup Reminder --}}
  <transition
    mode="out-in"
    name="fade"
  >
    <div
      v-if="show"
      class="popup"
      :class="{'popup--active': show }"
    >
      <div class="popup__box">
        <button
          v-if="done"
          @click.prevent="closeModal"
          class="btn popup__close"
        >
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M24 3.97748L20.0225 0L12 8.0225L3.97748 0L0 3.97748L8.02255 12L0 20.0225L3.97748 24L12 15.9775L20.0225 24L24 20.0225L15.9775 12L24 3.97748Z" fill="black"/>
          </svg>
        </button>
        <div
          v-if="done"
          class="popup__content"
        >
          <svg class="mb-3" width="140" height="140" viewBox="0 0 140 140" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip1)">
              <path d="M121.104 38.0876L128.964 35.7404C124.572 21.0335 114.879 8.54976 101.669 0.588623L97.4348 7.6146C108.892 14.5192 117.298 25.3416 121.104 38.0876Z" fill="#EC2427"/>
              <path d="M42.5652 7.61433L38.331 0.588623C25.121 8.54976 15.4274 21.0335 11.0354 35.7404L18.8954 38.0876C22.7019 25.3416 31.1079 14.5192 42.5652 7.61433Z" fill="#EC2427"/>
              <path d="M24.8828 53.3203V97.2855C24.8828 99.9305 23.8528 102.417 21.9827 104.287C18.5631 107.707 16.6797 112.253 16.6797 117.089V123.594H49.9048C51.8101 132.943 60.0961 140 70 140C79.9039 140 88.1896 132.943 90.0952 123.594H123.32V117.089C123.32 112.253 121.437 107.707 118.017 104.287C116.147 102.417 115.117 99.9305 115.117 97.2855V53.3203C115.117 29.8255 97.064 10.471 74.1016 8.39152V0H65.8984V8.39152C42.936 10.4707 24.8828 29.8252 24.8828 53.3203ZM70 131.797C64.6529 131.797 60.0939 128.368 58.4008 123.591H81.5989C79.9061 128.368 75.3471 131.797 70 131.797ZM106.914 53.3203V97.2855C106.914 102.122 108.798 106.668 112.217 110.088C113.681 111.551 114.629 113.392 114.973 115.391H25.0272C25.3706 113.392 26.3197 111.551 27.7832 110.088C31.2025 106.668 33.0859 102.122 33.0859 97.2855V53.3203C33.0859 32.9659 49.6456 16.4062 70 16.4062C90.3544 16.4062 106.914 32.9659 106.914 53.3203Z" fill="#EC2427"/>
            </g>
            <defs>
              <clipPath id="clip1">
                <rect width="140" height="140" fill="white"/>
              </clipPath>
            </defs>
          </svg>
          <h5 class="text-black m-0">Berhasil</h5>
          <p>
            Pengaturan pengingat sudah berhasil. Kami akan mengirimkan email pengingat ke email-mu!
          </p>
        </div>
        {{-- Form Reminder --}}
        <div
          v-else
          class="popup__content"
        >
          <h5 class="m-0 text-black">Atur Pengingat</h5>
          <p>
            Apakah kamu yakin ingin mengatur pengingat untuk acara ini?
            Kami akan mengirimkan pengingat ke email kamu.
          </p>
          <div class="form-holder">
            <div class="mb-3">
              <label for="email" class="label-form">Email</label>
              <input type="text" name="email" class="input-form" placeholder="Ketik email-mu disini" v-model="reminder.email">
            </div>
            <button
              @click.prevent="sendReminder"
              class="btn btn-crimson btn-send mb-2"
            >
              Lanjutkan
            </button>
            <button
              @click.prevent="closeModal"
              class="btn btn-white btn-cancel"
            >
              Batal
            </button>
          </div>
        </div>
      </div>
    </div>
  </transition>
</div>
{{-- https://youtu.be/JEK03-EzyHk --}}
@endsection
@section('before-body-end')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
<script type="text/javascript">
  const CHAT_SERVER = '{{ config("chat.host") }}';
  const IDLE_TIMEOUT = {{ config("chat.idle_timeout") }}; /* seconds */
  const STATUS_NOT_CONNECTED = 'not connected';
  const STATUS_CONNECTING = 'connecting...';
  const STATUS_CONNECTED = 'connected';
  const STATUS_DISCONNECTING = 'disconnecting...';
  const STATUS_DISCONNECTED = 'disconnected';

  var streamId = '{{ $stream->slug }}';
  var username = {!! $username ? "'$username'" : "null" !!};
  var socket = io(CHAT_SERVER);
  var idleTime = 0;

  var chatApp = new Vue({
    el: '#chat-app',
    data: {
      connection: {
        status: STATUS_NOT_CONNECTED
      },
      timer: {
        timeout: IDLE_TIMEOUT,
        limit: 0,
        counter: null
      },
      guest: {
        name: null,
        phone: null
      },
      reminder: {
        email: null
      },
      message: '',
      max: 200, //char length
      show: false,
      done: false,
      login: false,
      userIdLog: 21,
      showGuestForm: false,
      showChat: false,
      blocked: false,
      greeting: true,
      showMore: false,
      colorCache: {},
      chats: [],
    },
    computed: {},
    methods: {
      showReminder: function() {
        this.show = true
      },
      closeModal: function() {
        this.show = false
        this.done = false
      },
      sendReminder: function() {
        let _vm = this
        axios.post('{{ url('stream/remind-me') }}', {
          csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          stream_id: streamId,
          email: this.reminder.email
        })
        .then(function (response)  {
          if (response.data.success) {
            _vm.done = true
          }
        })
        .catch(function (error) {
          alert('Gagal mengirim data. Silahkan coba lagi.')
        })
      },
      scrollToBottom: function() {
        this.$nextTick( function () {
          this.$refs.chatContainer.scrollTop = this.$refs.chatContainer.scrollHeight
        })
      },
      randomColor: function(id) {
        const r = () => Math.floor(256 * Math.random());
        return this.colorCache[id] || (this.colorCache[id] = `rgb(${r()}, ${r()}, ${r()})`);
      },
      loginGuest: function() {
        this.showGuestForm = true
      },
      loginProcess: function() {
        this.showGuestForm = false
        this.login = true
      },
      joinChat: function() {
        let _vm = this
        this.login = false
        this.scrollToBottom()
        this.showChat = true
        this.connection.status = STATUS_CONNECTING;
        //hide greeting in 3 sec
        this.$nextTick(() => {
          setTimeout(() => {
            _vm.greeting = false
          }, 3000)
        })
        socket.emit('chat.join', {
          streamId: streamId,
          user: {
            id: 1,
            name: this.guest.name ?? username,
            photo: null,
            phone: this.guest.phone,
            is_guest: this.guest.name === null ? true : false,
          }
        }, function(response) {
          if (response.joined) {
            chatApp.$data.connection.status = STATUS_CONNECTED;
            chatApp.startTimer();
            _vm.scrollToBottom()
          }
        });
      },
      leaveChat: function() {
        this.connection.status = STATUS_DISCONNECTING;
        socket.emit('chat.leave', {
          streamId: streamId,
          user: {
            id: 1,
            name: username,
            photo: null,
            phone: this.guest.phone,
            is_guest: this.guest.name === null ? true : false,
          }
        }, function(response) {
          if (response.joined === false) {
            chatApp.$data.connection.status = STATUS_DISCONNECTED;
          }
        });
      },
      sendMessage: function(e) {
        let _vm =  this;
        if (this.message !== '') {
          socket.emit('chat.message', this.message);
          _vm.scrollToBottom()
        }

        this.message = '';
        this.timer.limit = IDLE_TIMEOUT;
        e.preventDefault();
      },
      startTimer: function() {
        this.timer.limit = IDLE_TIMEOUT;
        this.timer.counter = setInterval(() => (this.timer.limit--), 1000);
      },
      stopTimer() {
        this.leaveChat();
        this.connection.status = STATUS_DISCONNECTED;
        this.blocked = true;
        clearInterval(this.timer.counter);
      },
      reEnter: function() {
        this.joinChat();
        this.blocked = false
      }
    },
    watch: {
      'timer.limit': function(newValue) {
        if (newValue <= 0) {
          this.stopTimer();
        }
      },
    },
    created: function() {
      let _vm = this
      socket.on('chat.message', function(data) {
        this.chats.push({
          id: data.id,
          userId: data.user.id,
          name: data.user.name,
          photo: data.user.photo,
          status: data.user.is_guest,
          message: data.message
        });
        _vm.scrollToBottom()
      }.bind(this));
    },
  })
</script>
@endsection
