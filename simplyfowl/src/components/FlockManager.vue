<template>
    <div>
        <v-card max-width="1200px" max-height="" class="mx-auto mt-10"
        id="FarmList" tile>

            <v-card-title>Available Farms</v-card-title>
            <v-container
                    id="scroll-target"
                    style="max-height: 300px"
                    class="overflow-auto "
            >

                <!--This adds all the elements in farms from data() as list elements-->
            <v-list>
                <v-list-item-group v-model="farm">
                    <v-list-item
                            v-for="(farm, i) in farms"
                            :key="i"
                    >
                        <v-list-item-content>

                            <v-list-item-title v-text="farm.name"></v-list-item-title>
                        </v-list-item-content>

                    </v-list-item>


                </v-list-item-group>
            </v-list>
            </v-container>

            <v-card-actions>
                <!--Dialog for adding new farm-->
                <v-spacer></v-spacer>
                <v-dialog id="dialog" v-model="dialog" max-width="600px" overflow>
                    <template v-slot:activator="{ on }">
                        <v-btn color="brown" dark v-on="on">Add New Farm</v-btn>
                    </template>
                    <v-card id="farm_form">
                        <v-card-title>
                            <span class="headline">Add New Farm</span>
                        </v-card-title>
                        <v-card-text>
                            <v-form class="px4" ref="add_farm_form">
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field label="Farm Name" v-model="farm_name" :rules="inputRules"></v-text-field>
                                    </v-col>

                                    <v-col cols="12">
                                        <v-text-field label="Street Address Line 1" v-model="farm_address_1" :rules="inputRules"></v-text-field>
                                    </v-col>

                                    <v-col cols="12">
                                        <v-text-field label="Street Address Line 2 (optional)" v-model="farm_address_2"></v-text-field>
                                    </v-col>

                                    <v-col cols="6">
                                        <v-text-field label="City" v-model="farm_city" :rules="inputRules"></v-text-field>
                                    </v-col>

                                    <v-col cols="2">
                                        <v-text-field label="State" v-model="farm_state" :rules="inputRules"></v-text-field>
                                    </v-col>

                                    <v-col cols="4">
                                        <v-text-field label="Zip Code" v-model="farm_zip_code" :rules="inputRules"></v-text-field>
                                    </v-col>
                                </v-row>

                            </v-form>

                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-btn text large dark min-width="100" class="brown mx-4 my-3" @click="addFarm">
                                Save
                            </v-btn>
                            <v-btn text large dark min-width="100" class="brown mx-2 my-3" @click="cancelAddFarm">
                                Cancel
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>

            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
    export default {
        data: () => ({
            dialog: false,
            // input field values
            farm_name: '',
            farm_address_1: '',
            farm_address_2: '',
            farm_city: '',
            farm_state: '',
            farm_zip_code: '',

            farm: 0,
            // farm objects
            farms: [
                { name: 'Roosterville Farms'},
                { name: 'Farmplace Farm'},
                { name: 'Oldbarn Chicken City'},
                { name: 'Chickentown Farm'},
                { name: 'Bawkridge Apartments'},
                { name: 'Roosterville Farms 2: The Chickening'},
                { name: 'Farmville™'},
            ],
            // rules for validating input
            inputRules: [
                val => val && val.length > 0 || 'Field is required'
            ]

        }),
        methods:{
            addFarm: function () {
                // check if input follows rules
                if (this.$refs.add_farm_form.validate())
                {
                    // Create newFarm object to be added to the list
                    const newFarm = {
                        name: this.farm_name,
                        address: (this.farm_address_1 + ", " + this.farm_city + ", " + this.farm_state)
                    };

                    //POST METHOD TO ADD NEW FARM TO DATABASE WOULD GO HERE
                    this.farms.push(newFarm);

                    console.log(newFarm.name, ": ", newFarm.address);

                    // close dialog
                    this.dialog = false;

                    //reset form
                    this.$refs.add_farm_form.reset();
                }
            },
            cancelAddFarm: function () {
                this.dialog = false;
                this.$refs.add_farm_form.reset();
            }
        }
    }
</script>

<style scoped>
</style>
