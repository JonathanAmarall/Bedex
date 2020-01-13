<template>
  <div>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell text-white"></i>
        <span class="badge badge-warning navbar-badge ">{{ notificationsItems.length }}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header text-dark">{{ notificationsItems.length }} Notificações</span>
        <div class="dropdown-divider"></div>

          <a :href="'formulario/'+item.data.proposta.id" class="dropdown-item text-danger" v-for="item in notificationsItems" :key="item.id">
           Status alterado: <strong> {{ item.data.proposta.status }} </strong> 
          </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">Ver todas notificações</a>
      </div>
    </li>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      notificationsItems: []
    };
  },
  computed: {
    notifications() {
      return this.notificationsItems;
    }
  },
  created() {
    this.loadNotifications();
  },
  methods: {
    loadNotifications() {
      axios.get("/notifications").then(res => {
        console.log(res);
        this.notificationsItems = res.data.notifications
        });
    }
  }
  // created() {
  //   axios.get("/notifications").then(res => {
  //     var result = res.data.notifications;
  //     for (let index = 0; index < result.length; index++) {
  //       this.data  = result[index];
  //       // this.data = element.data[0];
  //       console.log(this.data.data[0].id);
  //     }

  //   });
  // }
};
</script>

<style scoped>
</style>