<template>
  <div class="row">
    <div class="col-8 offset-2 col-lg-6 offset-lg-3">
      <h3 class="text-center mb-3">Cadastrar Turma</h3>
      <div class="form-group">
        <label for="name">Número da Turma</label>
        <!-- <input type="text" name="name" class="form-control" v-model="turma.name"> -->
        <the-mask :mask="['###']" class="form-control" masked v-model="turma.name" autofocus />
        <small>OBS.: Apenas números</small>

      </div>

      <div class="form-group mt-5">
        <button @click="saveClass" type="button" class="btn btn-primary mr-3">Cadastrar</button>
        <a href="/" class="btn btn-secondary">Voltar</a>
      </div>
    </div>
  </div>

</template>

<script>

import {TheMask} from 'vue-the-mask'
import Swal from 'sweetalert2'

export default {

  components: {TheMask},

  data () {
    return {
      turma: {
        name: ''
      }
    }
  },

  methods: {
    saveClass () {
      axios({
        method: 'POST',
        url: '/class/create',
        data: this.turma
      }).then((result) => {
        Swal.fire('', 'Turma cadastrada com sucesso!', 'success')
        this.resetForm()
      }).catch((error) => {
        let errors = _.get(error, 'response.data.errors', false)

        if(errors) {
          Swal.fire('', _.toArray(errors).join('<br>'), 'error')
        } else {
          Swal.fire('', 'Erro ao criar a turma, preencha todos os campos!', 'error')
        }
      })
    },
    resetForm () {
      this.turma = {name: ''}
    },
  }
}
</script>

