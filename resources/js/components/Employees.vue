<template>
    <v-container text-xs-center grid-list-md px-4>
        <v-layout row wrap justify-space-around>
            <v-flex xs12 align-self-center>
                <section v-if="errored">
                    <p>We're sorry, we're not able to retrieve data at the moment, please try back later</p>
                </section>
                <section v-else>
                    <div v-if="isLoading">Loading employees...</div>
                    <div v-else>
                        <v-data-table
                                :headers="tableHeaders"
                                :items="employees"
                                item-key="index"
                                hide-actions
                                :pagination.sync="pagination"

                        >
                            <template slot="no-data">
                                <v-alert :value="true" color="error">
                                    Sorry, nothing to display here :(
                                </v-alert>
                            </template>
                            <template slot="items" slot-scope="props">
                                <tr @click="getEmployeesProfile(props.item)"
                                    :class="{ inactive: props.item.assignments.length === 0 }">
                                    <td class="text-xs-center">{{ props.item.first_name }}</td>
                                    <td class="text-xs-center">{{ props.item.last_name }}</td>
                                    <td class="text-xs-center">{{ props.item.id_number }}</td>
                                    <td v-if="props.item.assignments.length > 0" class="text-xs-center">
                                        {{getLatestEmployer(props.item)}}
                                    </td>
                                    <td v-else> Employee has no employment, he/she is inactive.</td>
                                </tr>
                            </template>
                        </v-data-table>
                        <div class="text-xs-center pt-2">
                            <v-pagination v-model="pagination.current"
                                          :length="pagination.total"
                                          total-visible="3"
                                          @input="onPageChange"
                                          color="#25499c"
                            >
                            </v-pagination>
                        </div>
                    </div>
                </section>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import axios from 'axios';
    import {API_BASE_URL} from '../config'

    export default {
        name: 'Employees',
        data() {
            return {
                isLoading: true,
                employees: [],
                errored: false,
                isEmployeeActive: true,
                employerName: [],
                pagination: {
                    current: 1,
                    total: 0
                },
                selected: [],
                tableHeaders: [
                    {text: 'First Name', align: 'center', sortable: false, value: 'first_name'},
                    {text: 'Last Name', align: 'center', sortable: false, value: 'last_name'},
                    {text: 'ID number', align: 'center', sortable: false, value: 'id_number'},
                    {text: 'Most recent employer', align: 'center', sortable: false, value: 'latest_employer'},
                ],
            }
        },
        methods: {
            getEmployees() {
                axios
                    .get(API_BASE_URL + '/employees?page=' + this.pagination.current)
                    .then(response => {
                        this.employees = response.data.data
                        this.pagination.current = response.data.meta.current_page;
                        this.pagination.total = response.data.meta.last_page;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.isLoading = false);
            },
            onPageChange() {
                this.getEmployees();
            },
            getEmployeesProfile($id) {
                this.$router.push({name: 'employeesProfile', params: {id: $id.id}});
            },
            getLatestEmployer(value) {
                let currents = value.assignments.filter(function (u) {
                    return u.status === 'CURRENT'
                })
                let future = value.assignments.filter(function (u) {
                    return u.status === 'FUTURE'
                })
                let past = value.assignments.filter(function (u) {
                    return u.status === 'PAST'
                })
                if (currents.length > 0) {
                    return this.employerName = currents[0].employer.name

                } else if (future.length > 0) {
                    return this.employerName = future[0].employer.name

                } else if (past.length > 0) {
                    return this.employerName = past[0].employer.name
                }
            }
        },
        mounted() {
            this.getEmployees();
        }
    }
</script>
