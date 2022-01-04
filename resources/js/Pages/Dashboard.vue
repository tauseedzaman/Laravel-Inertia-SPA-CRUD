<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-green-900 text-lg text-center">
              <b>Student Management System</b>
            </h1>
          </div>
          <div class="p-6 bg-white mx-auto border-b border-gray-200">
            <Link
              :href="route('create_student')"
              class="
                px-4
                py-2
                mb-4
                bg-orange-500
                border-2
                rounded
                shadow
                w-1/4
                hover:bg-green-600
              "
              >Add Student</Link
            >
            <table class="table-auto mt-4" style="width: 100%">
              <thead class="table-header-group">
                <tr class="text-lg bg-red-700 p-8 border shadow">
                  <th class="px-4 border">#</th>
                  <th class="px-4 border">Name</th>
                  <th class="px-4 border">Class</th>
                  <th class="px-4 border">RollNo</th>
                  <th class="px-4 border">City</th>
                  <th class="px-4 border">Dated</th>
                  <th class="px-4 border">Edit</th>
                  <th class="px-4 border">Delete</th>
                </tr>
              </thead>
              <tbody class="">
                <tr v-if="students.data == ''">
                  <td class="text-red-500 text-center" colspan="8">
                    No Student Found!
                  </td>
                </tr>
                <tr v-else v-for="student in students.data" :key="student.id">
                  <td class="p-2">{{ student.id }}</td>
                  <td class="p-2">{{ student.name }}</td>
                  <td class="p-2">{{ student.class }}</td>
                  <td class="p-2">{{ student.rollno }}</td>
                  <td class="p-2">{{ student.city }}</td>
                  <td class="p-2">{{ student.created_at }}</td>
                  <td class="p-2">
                    <BreezeButton
                      @click="edit(student.id)"
                      class="bg-yellow-800 shadow"
                    >
                      Edit
                    </BreezeButton>
                  </td>
                  <td>
                    <form @submit.prevent="destroy(student.id)">
                      <BreezeButton class="" type="submit">
                        Delete
                      </BreezeButton>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
            <pagination class="mt-6" :links="students.links" />
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import BreezeInput from "@/Components/Input.vue";
import { Link } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import Pagination from "@/Components/Pagination.vue";
import axios from "axios";
export default {
  props: {
    students: Object,
  },
  components: {
    BreezeAuthenticatedLayout,
    BreezeButton,
    Head,
    Link,
    BreezeInput,
    Pagination,
  },
  methods: {
    edit(iid) {
      this.$inertia.get(this.route("edit_student", iid));
    },
    destroy(id) {
      if (confirm("Are You Sure!")) {
        this.$inertia.delete(this.route("delete_student", id));
      }
    },
  },
};
</script>
