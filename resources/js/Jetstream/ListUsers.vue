<template>
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nome
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  E-mail
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Role
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="person in people" :key="person.email">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ person.name }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ person.email }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ person.category.description }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <jet-button :type="button" @click="editar(person.id)"> Editar </jet-button>
                  {{ ' ' }}
                  |
                  {{ ' ' }}
                  <jet-danger-button @click="confirmUserDeletion(person.id)">
                            Deletar
                  </jet-danger-button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    <div class="flex-1 flex justify-between sm:hidden">
      <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
        Anterior
      </a>
      <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
        Proxímo
      </a>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Exibindo
          {{ ' ' }}
          <span class="font-medium">{{to}}</span>
          {{ ' ' }}
          de
          {{ ' ' }}
          <span class="font-medium">{{total}}</span>
          {{ ' ' }}
          resultados
        </p>
      </div>
      <div>
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
          <a :href="prev" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Previous</span>
            <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
          </a>
          <div v-for="url in links" :key="url.url">
                <a v-if="url.label != 'pagination.previous' && url.label != 'pagination.next'"
                  :href="url.url" :class="url.active ? classAtivo : classInativo">
                    {{url.label}}
                </a>
          </div>
          <a :href="next" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Next</span>
            <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
          </a>
        </nav>
      </div>
    </div>
  </div>
  <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
    <template #title>
        Deletar o usuário
    </template>

    <template #content>
        Tem certeza que quer Deletar esse usuário? A conta sera deletada permanentemente.
    </template>

    <template #footer>
        <jet-secondary-button @click="closeModal">
            Cancelar
        </jet-secondary-button>

        <jet-danger-button class="ml-2" @click="deleteUser">
            Deletar usuário
        </jet-danger-button>
    </template>
  </jet-dialog-modal>
</template>

<script>

import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'
import JetDangerButton from '@/Jetstream/DangerButton'
import JetButton from '@/Jetstream/Button'
import JetDialogModal from '@/Jetstream/DialogModal'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'



const classAtivo = 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium'
const classInativo = 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium'
let oldto = 1;
export default {
  components: {
    ChevronLeftIcon,
    ChevronRightIcon,
    JetDangerButton,
    JetButton,
    JetDialogModal,
    JetSecondaryButton
  },
  setup() {
    return {
      classAtivo,
      classInativo,
      oldto,
    }
  },
  props: [
      'people',
      'last',
      'next',
      'first',
      'links',
      'total',
      'prev',
      'to'
  ],
  data() {
        return {
            confirmingUserDeletion: false,
            form: this.$inertia.form({
                    userid: '',
                })
        }
  },
  methods: {
            confirmUserDeletion(id) {
                this.confirmingUserDeletion = true;
                this.form.userid = id;

            },
            editar(id) {
                window.location.href = route('user.edit',id);
            },
            closeModal() {
                this.confirmingUserDeletion = false
            },
            deleteUser() {
                this.form.post(route('delete',this.form.userid), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => alert('teste'),
                    onFinish: () => this.form.reset(),
                })
            },
  }

}
</script>
