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
                  <input type="text" class="form-control" v-model="schedule.start_time">
                </label>
              </div>
              <div class="col-6">
                <label>
                  Horário de término
                  <input type="text" class="form-control" v-model="schedule.end_time">
                </label>
              </div>
            </div>
          </div>

          <button class="btn btn-success" @click="addSchedule"> <i class="icon-plus"></i> Adicionar horário</button>
      </div>

      <div class="form-group mt-5">
          <button @click="saveTeacher" type="button" class="btn btn-primary mr-3">Enviar</button>
          <input type="reset" value="Cancelar" class="btn btn-secondary">
      </div>
    
    </div>
  </div>
</template>

<script>

const defaultSchedule = {
  weekday: '',
  start_time: '',
  end_time: ''
}

export default {
  name: 'TeacherCreate',

  data () {
    return {
      weekdays: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
      teacher: {
        name: '',
        course: '',
        schedules: [
          _.cloneDeep(defaultSchedule)
        ]
      }
    }
  },

  methods: {
    addSchedule () {
      this.teacher.schedules.push(_.cloneDeep(defaultSchedule))
    },

    removeSchedule(i) {
      this.teacher.schedules.splice(i, 1)
    },

    createObject(key, value) {
      let a = {}
      a[key] = value
      return a
    },

    saveTeacher() {
      axios({
        method: 'POST',
        url: '/teacher/create',
        data: this.teacher
      }).then((result) => {
        console.log(result);
      }).catch((error) => {
        console.log('e', error.response);
      })

      console.log('teste')
    }
  }
}
</script>