
<!-- TimerComponent.vue -->
<template>
  <div :key="key" class="w-full h-12 mx-auto bg-white p-4 rounded-md shadow-md text-center text-gray-800">
    <!-- <h1 class="text-lg font-semibold mb-2">Session Expiry</h1> -->
    <p class="text-sm mb-4 text-red-500 font-semibold">
      Your session will expire in
      <span id="countdown">
        {{ minutes }}:{{ seconds < 10 ? '0' : '' }}{{ seconds }} </span>
          Mins
    </p>
    <!-- <div class="text-sm text-gray-500">⏳</div> -->
    <p class="text-xl text-red-500" v-if="sessionExpired" :class="{ 'blink': seconds < 5 }">
      Wooops !! Session is going to expired in {{ minutes }}:{{ seconds < 10 ? '0' : '' }}{{ seconds }} </p>
  </div>
</template>

<script>
export default {
  props: {
    initial: {
      type: Boolean,
      default: false,
      required: false,
    }
  },
  data() {
    return {
      sessionStartedTime: null,
      sessionEndTime: null,
      sessionExpired: false,
      minutes: null,
      seconds: null, // Set your initial timer value in seconds
    };
  },

  mounted() {
    console.log('window.location.href', window.location.href);
    console.log('initial', this.initial);
    // if (this.initial) {
    if (!localStorage.sessionStartedTime) {
      localStorage.sessionStartedTime = new Date().toLocaleTimeString();
      var currentTime = new Date();
      currentTime.setMinutes(currentTime.getMinutes() + 30);
      const formattedTime = currentTime.toLocaleTimeString();
      localStorage.sessionEndTime = formattedTime;
      this.sessionStartedTime = localStorage.sessionStartedTime;
      this.sessionEndTime = localStorage.sessionEndTime;
      var currentTime = new Date().toLocaleTimeString();
      this.calculateSessionRemaining(currentTime, this.sessionEndTime);
    }
    else {
      this.sessionStartedTime = localStorage.sessionStartedTime;
      this.sessionEndTime = localStorage.sessionEndTime;
      const currentTime = new Date().toLocaleTimeString();
      //   console.log('this.sessionStartedTime',this.sessionStartedTime)
      //   console.log('this.currentTime',currentTime)
      //   console.log('this.sessionEndTime',this.sessionEndTime)
      this.calculateSessionRemaining(currentTime, this.sessionEndTime);
    }
    // console.log('sessionTimeRemaining',this.sessionTimeRemaining)
    this.startCountdown();
    // this.startCountdown();
  },
  methods: {

    startCountdown() {
      this.interval = setInterval(this.updateCountdown, 1000);
    },
    updateCountdown() {
      if (this.minutes === 0 && this.seconds === 5) {
        this.sessionExpired = true;
      }
      if (this.minutes === 0 && this.seconds === 0) {
        clearInterval(this.interval);
        localStorage.clear();
        this.redirectToPage();
        // Do something when the countdown reaches 0
      }
        if (this.minutes < 0 || (this.minutes === 0 && this.seconds === 0)) {
            clearInterval(this.interval);
            localStorage.clear();
            this.redirectToPage();
        }
        else {
        if (this.seconds === 0) {
          this.minutes--;
          this.seconds = 59;
        } else {
          // this.seconds--;
          this.seconds--;
        }
      }
    },
    redirectToPage() {
      window.location.href = "/";
    },
    calculateSessionRemaining(currentTime, sessionEndTime) {

      const sessionEndDate = new Date('2000-01-01 ' + sessionEndTime);
      const currentDate = new Date('2000-01-01 ' + currentTime);

      const timeDifference = sessionEndDate - currentDate;

      const hours = Math.floor(timeDifference / (1000 * 60 * 60));
      const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
      this.seconds = seconds;
      this.minutes = minutes;
      // console.log(`Time difference: ${hours} hours, ${minutes} minutes, ${seconds} seconds`);

    }
  },
};
</script>

<style scoped>
.blink {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
