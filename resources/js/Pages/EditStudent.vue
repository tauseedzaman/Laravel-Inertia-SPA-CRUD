<template>
  <Head title="Edit Student" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Student
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-green-900 text-lg text-center">
              Student Management System
            </h1>
            <BreezeValidationErrors class="mb-4" />
            <form @submit.prevent="submit">
              <input type="hidden" name="csrf-token" value="csrf" />
              <div class="mt-4">
                <BreezeLabel for="name" value="Name" />
                <BreezeInput
                  id="name"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.name"
                  required
                  autofocus
                  autocomplete="name"
                />
              </div>

              <div class="mt-4">
                <BreezeLabel for="class" value="Class" />
                <BreezeInput
                  id="class"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.class"
                  required
                  autofocus
                  autocomplete="class"
                />
              </div>
              <div class="mt-4">
                <BreezeLabel for="rollno" value="Rollno" />
                <BreezeInput
                  id="rollno"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.rollno"
                  required
                  autofocus
                  autocomplete="rollno"
                />
              </div>
              <div class="mt-4">
                <BreezeLabel for="city" value="City" />
                <BreezeInput
                  id="city"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="form.city"
                  required
                  autofocus
                  autocomplete="city"
                />
              </div>
              <Link :href="route('dashboard')" class="mr-2 bg-green-500 px-4 py-1 text-yellow-600 border border-2 rounded border-green-700 shadow hover:bg-green-800 hover:text-green-100">Cancel</Link>
              <BreezeButton
                class="mt-4 mx-auto bg-red-400"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Update Student
              </BreezeButton>
            </form>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeButton from "@/Components/Button.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

export default {
  components: {
    BreezeAuthenticatedLayout,
    BreezeButton,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
    Head,
    Link,
  },
  props:{
      student:Object
  },
  data() {
    return {
      csrf: document.head.querySelector('meta[name="csrf-token"]')
        ? document.head.querySelector('meta[name="csrf-token"]').content
        : "",
      form: this.$inertia.form({
        _token: document.head.querySelector('meta[name="csrf-token"]')
          ? document.head.querySelector('meta[name="csrf-token"]').content
          : "",
        name: this.student.name,
        rollno: this.student.rollno,
        city: this.student.city,
        class: this.student.class,
      }),
    };
  },
  methods: {
    submit() {
      this.form.put(this.route("update_student",this.student.id), {
        //
      });
    },
  },
};
</script>
