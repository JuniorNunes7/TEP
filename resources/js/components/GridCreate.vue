<template>
    <div class="row">
        <div class="col-10 offset-1 col-lg-8 offset-lg-2">
            <h3 class="text-center mb-3">Cadastrar Grades</h3>
            <div class="form-group">
                <label for="class">Selecione a turma...</label>
                <select class="form-control" v-model="selectedClass">
                    <option :value="cl" v-for="cl in classes" :key="cl.id">{{ cl.name }}</option>
                </select>
            </div>

            <div class="col-12">
                <table v-if="selectedClass" class="table table-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Segunda</th>
                            <th>Terça</th>
                            <th>Quarta</th>
                            <th>Quinta</th>
                            <th>Sexta</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>07:00</td>
                            <td :class="{unavailable: isUnavailable(1,'07:00:00'), selected: isSelected(1,'07:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'07:00:00'), selected: isSelected(2,'07:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'07:00:00'), selected: isSelected(3,'07:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'07:00:00'), selected: isSelected(4,'07:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'07:00:00'), selected: isSelected(5,'07:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>08:00</td>
                            <td :class="{unavailable: isUnavailable(1,'08:00:00'), selected: isSelected(1,'08:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'08:00:00'), selected: isSelected(2,'08:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'08:00:00'), selected: isSelected(3,'08:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'08:00:00'), selected: isSelected(4,'08:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'08:00:00'), selected: isSelected(5,'08:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>09:00</td>
                            <td :class="{unavailable: isUnavailable(1,'09:00:00'), selected: isSelected(1,'09:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'09:00:00'), selected: isSelected(2,'09:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'09:00:00'), selected: isSelected(3,'09:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'09:00:00'), selected: isSelected(4,'09:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'09:00:00'), selected: isSelected(5,'09:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>10:00</td>
                            <td :class="{unavailable: isUnavailable(1,'10:00:00'), selected: isSelected(1,'10:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'10:00:00'), selected: isSelected(2,'10:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'10:00:00'), selected: isSelected(3,'10:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'10:00:00'), selected: isSelected(4,'10:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'10:00:00'), selected: isSelected(5,'10:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>11:00</td>
                            <td :class="{unavailable: isUnavailable(1,'11:00:00'), selected: isSelected(1,'11:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'11:00:00'), selected: isSelected(2,'11:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'11:00:00'), selected: isSelected(3,'11:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'11:00:00'), selected: isSelected(4,'11:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'11:00:00'), selected: isSelected(5,'11:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>12:00</td>
                            <td :class="{unavailable: isUnavailable(1,'12:00:00'), selected: isSelected(1,'12:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'12:00:00'), selected: isSelected(2,'12:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'12:00:00'), selected: isSelected(3,'12:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'12:00:00'), selected: isSelected(4,'12:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'12:00:00'), selected: isSelected(5,'12:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>13:00</td>
                            <td :class="{unavailable: isUnavailable(1,'13:00:00'), selected: isSelected(1,'13:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'13:00:00'), selected: isSelected(2,'13:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'13:00:00'), selected: isSelected(3,'13:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'13:00:00'), selected: isSelected(4,'13:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'13:00:00'), selected: isSelected(5,'13:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>14:00</td>
                            <td :class="{unavailable: isUnavailable(1,'14:00:00'), selected: isSelected(1,'14:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'14:00:00'), selected: isSelected(2,'14:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'14:00:00'), selected: isSelected(3,'14:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'14:00:00'), selected: isSelected(4,'14:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'14:00:00'), selected: isSelected(5,'14:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>15:00</td>
                            <td :class="{unavailable: isUnavailable(1,'15:00:00'), selected: isSelected(1,'15:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'15:00:00'), selected: isSelected(2,'15:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'15:00:00'), selected: isSelected(3,'15:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'15:00:00'), selected: isSelected(4,'15:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'15:00:00'), selected: isSelected(5,'15:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>16:00</td>
                            <td :class="{unavailable: isUnavailable(1,'16:00:00'), selected: isSelected(1,'16:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'16:00:00'), selected: isSelected(2,'16:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'16:00:00'), selected: isSelected(3,'16:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'16:00:00'), selected: isSelected(4,'16:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'16:00:00'), selected: isSelected(5,'16:00:00')}"></td>
                        </tr>
                        <tr>
                            <td>17:00</td>
                            <td :class="{unavailable: isUnavailable(1,'17:00:00'), selected: isSelected(1,'17:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(2,'17:00:00'), selected: isSelected(2,'17:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(3,'17:00:00'), selected: isSelected(3,'17:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(4,'17:00:00'), selected: isSelected(4,'17:00:00')}"></td>
                            <td :class="{unavailable: isUnavailable(5,'17:00:00'), selected: isSelected(5,'17:00:00')}"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <h3>Professores</h3>
                <div class="col-12">
                    <div class="col-12" v-for="teacher in teachers" :key="teacher.id">
                        <b>{{ teacher.name }}</b>
                        
                        <div class="col-12 mb-2" v-for="schedule in teacher.schedules" :key="schedule.id">
                            <span>{{ schedule.start_time }} - {{ schedule.end_time }}</span>
                            <button v-if="!isAddedHour(schedule)" @click="addHour(schedule)" :disabled="!selectedClass" 
                                class="btn btn-sm btn-primary" 
                            >+ Adicionar</button>
                            <button v-else @click="removeHour(schedule)" :disabled="!selectedClass" 
                                class="btn btn-sm btn-danger" 
                            >x Remover</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-5">
                <button @click="save" type="button" class="btn btn-primary mr-3">Salvar</button>
                <a href="/" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</template>

<script>
const weekdays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb']

import Swal from 'sweetalert2'

export default {
    props: ['teachers', 'classes'],

    data () {
        return {
            selectedClass: '',
            selectedHours: []
        }
    },

    // watch: {
    //     selectedClass (val) {
    //         if(val) {
    //             this.selectedHours = val.schedules
    //         } else {
    //             this.selectedHours = []
    //         }
    //     }
    // },

    methods: {
        isUnavailable (weekday, hour) {
            weekday = weekdays[weekday]
            const hours = _.filter(this.selectedClass.schedules, (s) => {
                return s.weekday === weekday
            })

            let unavailable = false
            _.each(hours, (h) => {
                if(h.start_time <= hour && h.end_time >= hour) {
                    unavailable = true
                }
            })

            return unavailable
        },

        isSelected (weekday, hour) {
            weekday = weekdays[weekday]
            const hours = _.filter(this.selectedHours, (s) => {
                return s.weekday === weekday
            })

            let isSelected = false
            _.each(hours, (h) => {
                if(h.start_time <= hour && h.end_time >= hour) {
                    isSelected = true
                }
            })

            return isSelected
        },

        isAddedHour (schedule) {
            return _.some(this.selectedHours, ['id', schedule.id])
        },

        addHour (schedule) {
            this.selectedHours.push(schedule)
        },

        removeHour (schedule) {
            this.selectedHours = _.filter(this.selectedHours, h => h.id !== schedule.id)
        },

        save () {
            if(document.querySelectorAll('td.unavailable.selected').length > 0) {
                Swal.fire('', 'Existem uma ou mais grades conflitantes!', 'error')
            } else {
                const data = {
                    class_id: this.selectedClass.id,
                    schedules: _.map(this.selectedHours, 'id')
                }
                axios({
                    method: 'PUT',
                    url: '/grid/update',
                    data: data
                }).then((result) => {
                    Swal.fire('', 'A grade foi montada com sucesso!', 'success')
                }).catch((error) => {
                    let errors = _.get(error, 'response.data.errors', false)
    
                    if(errors) {
                    Swal.fire('', _.toArray(errors).join('<br>'), 'error')
                    } else {
                    Swal.fire('', 'Erro ao montar a grade!', 'error')
                    }
                })
            }
        }
    },

    computed: {
        getClassGrids () {
            return this.selectedClass ? this.selectedClass : [] 
        }
    }
}
</script>

<style scoped>
    td.unavailable {
        background-color: green;
    }

    td.selected {
        background-color: blue;
    }

    td.selected.unavailable {
        background-color: red;
    }
</style>
