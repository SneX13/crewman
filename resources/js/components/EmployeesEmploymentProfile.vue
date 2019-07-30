<template>
    <v-layout row class="px-4 mb-3">
        <v-flex xs12 sm8 offset-sm2>
            <v-card>
                <v-toolbar color="#25499c" flat>
                    <v-toolbar-title>Employment profile</v-toolbar-title>
                </v-toolbar>
                <div>
                    <v-expansion-panel
                            expand
                            v-model="panel">
                        <v-expansion-panel-content>
                            <template slot="header">
                                <div>
                                    <v-icon class="mr-4">mdi-account-card-details-outline</v-icon>
                                    Personal info
                                </div>
                            </template>
                            <v-card>
                                <v-card-text>
                                    <span class="grey--text">Id number: </span> {{employeeDetails.id_number}} <br>
                                    <span class="grey--text">Full name: </span> {{employeeDetails.first_name}}
                                    {{employeeDetails.last_name}}<br>

                                </v-card-text>
                            </v-card>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </div>

                <div>
                    <v-expansion-panel
                            expand>
                        <v-expansion-panel-content>
                            <template slot="header">
                                <div>
                                    <v-icon class="mr-4">mdi-briefcase-outline</v-icon>
                                    Employments
                                </div>
                            </template>
                            <v-card>
                                <v-card-text>
                                    <div v-if="currentEmployments.length">
                                        <div v-for="item in currentEmployments" :key="item.index">
                                            <p>
                                                <span class="grey--text">Current: </span>{{item.title}}
                                            </p>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <p>
                                            <span class="grey--text">Current: </span> N/A
                                        </p>
                                    </div>
                                    <div v-if="futureEmployments.length">
                                        <p><span class="grey--text">Future: </span>
                                            <span v-for="item in futureEmployments" :key="item.index">
                                             {{ item.title }},
                                        </span>
                                        </p>
                                    </div>
                                    <div v-else>
                                        <p>
                                            <span class="grey--text">Future: </span> N/A
                                        </p>
                                    </div>
                                    <div v-if="pastEmployments.length">
                                        <p><span class="grey--text">Past: </span>
                                            <span v-for="item in pastEmployments" :key="item.index">
                                             {{ item.title }},
                                        </span>
                                        </p>
                                    </div>
                                    <div v-else>
                                        <p>
                                            <span class="grey--text">Past: </span> N/A
                                        </p>
                                    </div>
                                </v-card-text>
                            </v-card>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </div>

                <div>
                    <v-expansion-panel
                            expand>
                        <v-expansion-panel-content>
                            <template slot="header">
                                <div>
                                    <v-icon class="mr-4">mdi-file-document-box-check-outline</v-icon>
                                    Assignments
                                </div>
                            </template>
                            <v-card>
                                <v-data-table
                                        :headers="tableHeaders"
                                        :items="employeeAssignments"
                                        :expand="expand"
                                        item-key="id"
                                        hide-actions
                                >
                                    <template slot="items" slot-scope="props">
                                        <tr @click="props.expanded = !props.expanded">
                                            <td class="text-xs-center">{{ props.item.title }}</td>
                                            <td>{{ props.item.employer['name']}}</td>
                                            <td class="text-xs-center">{{ props.item.status }}</td>
                                            <td class="text-xs-center">
                                                <template v-for="location in props.item.locations">
                                                    {{location.location}}
                                                </template>
                                            </td>
                                            <td>
                                                <template v-for="roles in props.item.roles">
                                                    {{roles.title}} <br>
                                                    <span class="grey--text">Start date: {{roles.start_date}}</span>
                                                    <span class="grey--text">End date: {{roles.end_date}}</span><br>
                                                </template>
                                            </td>
                                            <td>
                                                <template v-for="leaves in props.item.leaves">
                                                    {{leaves.type}} <br>
                                                    <span class="grey--text">Start date: {{leaves.start_date}}</span>
                                                    <span class="grey--text">End date: {{leaves.end_date}}</span><br>
                                                </template>
                                            </td>
                                        </tr>
                                    </template>
                                </v-data-table>
                            </v-card>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </div>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
    import axios from 'axios';
    import {API_BASE_URL} from '../config'

    export default {
        name: "EmployeesEmploymentProfile",
        props: {},
        data() {
            return {
                id: this.$route.params.id,
                employeeDetails: {},
                errored: false,
                isLoading: true,
                panel: [true, true, true],
                employeeEmployments: [],
                expand: false,
                tableHeaders: [
                    {text: 'Name', align: 'center', sortable: false, value: 'title'},
                    {text: 'Given by', align: 'center', sortable: false, value: 'employer_name'},
                    {text: 'Status', align: 'center', sortable: false, value: 'status'},
                    {text: 'Countries', align: 'center', sortable: false, value: 'locations'},
                    {text: 'Roles', align: 'center', sortable: false, value: 'roles'},
                    {text: 'Leaves', align: 'center', sortable: false, value: 'leaves'},
                ],
                employeeAssignments: []
            }
        },
        mounted() {
            axios
                .get(API_BASE_URL + '/employees/' + this.id)
                .then(response => {
                    this.employeeDetails = response.data
                    this.employeeAssignments = response.data.assignments
                    this.employeeEmployments = response.data.employment
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() => this.isLoading = false)
        },
        computed: {
            currentEmployments() {
                return this.employeeEmployments.filter(function (u) {
                    return u.status === 'CURRENT'
                })
            },
            futureEmployments() {
                return this.employeeEmployments.filter(function (u) {
                    return u.status === 'FUTURE'
                })
            },
            pastEmployments() {
                return this.employeeEmployments.filter(function (u) {
                    return u.status === 'PAST'
                })
            }
        }
    }

</script>

<style scoped>
    .v-list {
        padding: 0px;
    }

    .theme--light.v-toolbar {
        color: #ffffff;
    }
</style>
