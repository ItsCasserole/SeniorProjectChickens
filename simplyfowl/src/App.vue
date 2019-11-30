<template>
  <v-app>

    <v-navigation-drawer
            v-model="drawer"
            color="brown"
            dark
            app>
      <v-list dense>
        <v-list-item @click="">
          <v-list-item-action>
            <v-icon x-large>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <h2>Home</h2>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>

        <v-list-item @click="">
          <v-list-item-action>
            <v-icon x-large>mdi-cowboy</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <h3>Flock Manager</h3>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>


      </v-list>
    </v-navigation-drawer>

    <v-app-bar
            app
            color="brown"
            dark
    >
      <v-app-bar-nav-icon x-large @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Simply Fowl</v-toolbar-title>
    </v-app-bar>
    <div>
    </div>
    <v-content>

      <FlockManager></FlockManager>

    </v-content>

  </v-app>
</template>

<script>
import FlockManager from "./components/FlockManager";

export default {
  name: 'App',
  components: {
    FlockManager,
  },
  data: () => ({
    drawer: null,
  }),
};
</script>


