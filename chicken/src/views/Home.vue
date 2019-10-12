<template>
  <div class="home">
    <img alt="project logo" src="../assets/simplyfowl.png">
    <HelloWorld msg="Welcome to Raab Enterprises!"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'home',
  components: {
    HelloWorld
  }
}
</script>
