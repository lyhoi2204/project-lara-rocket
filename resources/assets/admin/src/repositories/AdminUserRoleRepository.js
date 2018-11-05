import BaseRepository from "./BaseRepository";

class AdminUserRoleRepository extends BaseRepository {
  constructor(){
    super();
    this.PATH = "/admin_user_roles";
  }
}

export default AdminUserRoleRepository;
