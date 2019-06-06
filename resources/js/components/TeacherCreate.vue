<template>
  <div class="row">
    <div class="col-8 offset-2 col-lg-6 offset-lg-3">
      <h3 class="text-center mb-3">Cadastrar Professor</h3>
      <div class="form-group">
          <label for="name">Nome do Professor</label>
          <input type="text" name="nome" class="form-control" v-model="teacher.name" autofocus>
      </div>

      <div class="form-group">
          <label for="course">Disciplina</label>
          <select id="course" class="form-control" v-model="teacher.course_id">
              <option value="" disabled="" selected="">Selecione a disciplina...</option>
              <option :value="course.id" v-for="(course, i) in courses" :key="i">{{ course.name }}</option>
          </select>
      </div>

      <div class="form-group">
          <div>Horários</div>

          <div v-for="(schedule, i) in teacher.schedules" :key="i">
            <button class="btn btn-sm btn-danger" @click="removeSchedule(i)" title="Remover Horário" 
              :disabled="teacher.schedules.length < 2">X</button>
            <div class="form-check form-check-inline" v-for="(weekday, w) in weekdays" :key="w">
                <label>
                  <input class="form-check-input" :name="`schedule-${i}`" type="radio" :value="weekday" 
                    v-model="schedule.weekday">
                  {{ weekday }}
                </label>
            </div>

            <div class="col-12 row">
              <div class="col-6">
                <label>
                  Horário de início
                  <select id="time_start" class="form-control" v-model="schedule.start_id">
                    <option value="" disabled="" selected="">Selecione o horário...</option>
                    <option :value="time.id" v-for="(time, i) in times" :key="i"
                      :disabled="schedule.end_id && time.id >= schedule.end_id || time.interval === 1">{{ time.title }}</option>
                  </select>
                </label>
              </div>
              <div class="col-6">
                <label>
                  Horário de término
                  <select id="time_end" class="form-control" v-model="schedule.end_id">
                    <option value="" disabled="" selected="">Selecione o horário...</option>
                    <option :value="time.id" v-for="(time, i) in times" :key="i" 
                      :disabled="schedule.start_id && time.id <= schedule.start_id || time.interval === 1">{{ time.title }}</option>
                  </select>
                </label>
              </div>
            </div>
          </div>

          <button class="btn btn-success" @click="addSchedule"> <i class="icon-plus"></i> Adicionar horário</button>
      </div>

      <div class="form-group mt-5">
          <button @click="saveTeacher" type="button" class="btn btn-primary mr-3">Cadastrar</button>
          <a href="/" class="btn btn-secondary">Voltar</a>
      </div>
    
    </div>
  </div>
</template>

<script>

import {TheMask} from 'vue-the-mask'
import Swal from 'sweetalert2'

const defaultSchedule = {
  weekday: ''
}

const defaultTeacher = {
  name: '',
  course_id: '',
  schedules: [
    _.cloneDeep(defaultSchedule)
  ]
}

export default {
  name: 'TeacherCreate',

  props: ['courses', 'times'],

  components: {TheMask},

  data () {
    return {
      errors: {},
      weekdays: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'],
      teacher: _.cloneDeep(defaultTeacher)
    }
  },

  methods: {
    addSchedule () {
      this.teacher.schedules.push(_.cloneDeep(defaultSchedule))
    },

    removeSchedule(i) {
      this.teacher.schedules.splice(i, 1)
    },

    resetForm () {
      this.teacher = _.cloneDeep(defaultTeacher)
    },

    saveTeacher() {
      axios({
        method: 'POST',
        url: '/teacher/create',
        data: this.teacher
      }).then((result) => {
        Swal.fire('', 'Professor cadastrado com sucesso!', 'success')
        this.resetForm()
      }).catch((error) => {
        let errors = _.get(error, 'response.data.errors', false)

        if(errors) {
          Swal.fire('', _.toArray(errors).join('<br>'), 'error')
        } else {
          Swal.fire('', 'Erro ao criar professor, preencha todos os campos!', 'error')
        }
      })
    }
  }
}
</script>