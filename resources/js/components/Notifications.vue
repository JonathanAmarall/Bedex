<template>
  <div >
    <li class="dropdown">
      <a  class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell text-white"
        ></i>
        <span class="badge badge-warning navbar-badge" 
         :class="{'d-none': notifications.length <= 0 }">{{ notifications.length }}
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg">
        <span class="dropdown-item dropdown-header text-dark"
        v-if="notifications.length > 0">Notificações</span>
        <span class="dropdown-item dropdown-header text-dark"
        v-else="">Não possui notificações</span>
         <div class="dropdown-divider"></div>
         
          <a
            :href="'/formulario/'+item.data.proposta.id"
            class="dropdown-item text-danger p-1 loopFor"
            v-for="item in notifications"
            :key="item.id">
            <span @click="markAsRead(item.id)"> 
              Você possui um novo status em uma proposta: "{{ item.data.proposta.status }}"
            </span>
            <div class="dropdown-divider"></div>
          </a>

        <a
          href="#"
          @click.prevent="markAllAsRead()"
          class="dropdown-item dropdown-footer"
        >Marcar todas como lida</a>

      </div>
    </li>
  </div>
</template>

<script>
import axios from "axios";
export default {
  created() {
    this.loadNotifications();
  },
  computed: {
    notifications() {
      return this.$store.state.notifications.items;
    }
  },
  created() {
    this.$store.dispatch("loadNotifications");
  },
  methods: {
    markAsRead(idNotification) {
      this.$store.dispatch("markAsRead", { id: idNotification });
    },
    markAllAsRead() {
      this.$store.dispatch("markAllAsRead");
    }
  }
};
</script>

<style scoped>
.loopFor {
  display: inline;
  font-size: 12px;
}
</style>