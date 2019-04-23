<template>
  <div class="row">
    <div class="col-8 offset-2 col-lg-6 offset-lg-3">
      <h3 class="text-center mb-3">Cadastrar Professor</h3>
      <div class="form-group">
          <label for="name">Nome do Professor</label>
          <input type="text" name="nome" class="form-control" v-model="teacher.name">
      </div>

      <div class="form-group">
          <label for="course">Curso</label>
          <select id="course" class="form-control" v-model="teacher.course">
              <option value="" disabled="" selected="">Selecione o curso...</option>
              <option value="Sistemas de Informação">Sistemas de Informação</option>
              <option value="História">História</option>
              <option value="Educação Física">Educação Física</option>
              <option value="Fisioterapia">Fisioterapia</option>
              <option value="Engenharia">Engenharia</option>
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
                  <the-mask :mask="['##:##']" class="form-control" masked v-model="schedule.start_time" />
                </label>
              </div>
              <div class="col-6">
                <label>
                  Horário de término
                  <the-mask :mask="['##:##']" class="form-control" masked v-model="schedule.end_time" />
                </label>
              </div>
            </div>
          </div>

          <button class="btn btn-success" @click="addSchedule"> <i class="icon-plus"></i> Adicionar horário</button>
      </div>

      <div class="form-group mt-5">
          <button @click="saveTeacher" type="button" class="btn btn-primary mr-3">Enviar</button>
          <button @click="resetForm" class="btn btn-secondary">Cancelar</button>
      </div>
    
    </div>
  </div>
</template>

<script>

import {TheMask} from 'vue-the-mask'
import Swal from 'sweetalert2'

const defaultSchedule = {
  weekday: '',
  start_time: '',
  end_time: ''
}

const defaultTeacher = {
  name: '',
  course: '',
  schedules: [
    _.cloneDeep(defaultSchedule)
  ]
}

export default {
  name: 'TeacherCreate',

  components: {TheMask},

  data () {
    return {
      errors: {},
      weekdays: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
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
        Swal.fire('', 'Professor criado com sucesso!', 'success')
        this.resetForm()
      }).catch((error) => {
        let errors = _.get(error, 'response.data.errors', false)

        if(errors) {
          Swal.fire('', _.toArray(errors).join('<br>'), 'error')
        } else {
          Swal.fire('', 'Erro ao criar professor, preencha todos os campos!', 'error')
        }
        console.log('e', error.response);
      })

      console.log('teste')
    }
  }
}
</script>