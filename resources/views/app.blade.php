<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Crewman</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<div id="app">
    <v-app class="white">
        <v-toolbar flat app class="white" :class="{'px-5': $vuetify.breakpoint.mdAndUp}">
          <a href="/" class="mt-5">
                <v-img src="/img/logo.png" alt="OSM Aviation" width="100px" contain responsive></v-img>
            </a>
            <v-spacer></v-spacer>
            <v-toolbar-items class="mt-5">
                <v-btn flat class="text-none title navigation-link" :to="{ name: 'home'}" exact>
              Home
                </v-btn>
                <v-btn flat class="text-none title navigation-link" :to="{ name: 'employees'}" exact>
             Employees
                </v-btn>

            </v-toolbar-items>
        </v-toolbar>
        <v-content class="mt-5">
            <router-view></router-view>
        </v-content>
        <v-footer
                height="auto"
                color="#25499c">
            <v-layout
                    justify-center
                    row
                    wrap>
                <v-flex
                        py-3
                        text-xs-center
                        white--text
                        xs12>
                    © 2019 OSM Aviation Group
                </v-flex>
            </v-layout>
        </v-footer>
    </v-app>
</div>
<!-- Scripts -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
</body>
</html>
