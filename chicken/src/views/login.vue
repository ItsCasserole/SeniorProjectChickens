<template>
    <div id="login">
      <h1>Login</h1>
      <input type="text" name="username" v-model="input.username" placeholder="Username"/><br>
      <input type="password" name="password" v-model="input.password" placeholder="Password"/><br>
      <button type="button" v-on:click="login()">Login</button>
    </div>
</template>

<script>
  export default {
    name: 'login',
    data() {
      return {
        input: {
          username: "",
          password: ""
        }
      }
    },
    methods: {
      login() {
        if(this.input.username != "" && this.input.password != "") {
          if(this.input.username == this.$parent.mockAccount.username && this.input.password == this.$parent.mockAccount.password) {
            this.$emit("authenticated", true);
            this.$router.replace({ name: "home" });
          } else {
            alert("The username and/or password is incorrect.");
          }
        } else {
          alert("No username and/or password has been entered.")
        }
      }
    }
  }
</script>

<style scoped>
    #login {
      width: 500px;
      border: 1px solid #CCCCCC;
      background-color: #FFFFFF;
      margin: auto;
      margin-top: 200px;
      padding: 20px;
    }
</style>
