import React, {Component} from 'react';
import {Switch, Route, Redirect} from 'react-router-dom';
import {Container} from 'reactstrap';
import {PropsRoute} from 'react-router-with-props';
import Header from '../../components/Header/Header';
import Sidebar from '../../components/Sidebar/Sidebar';
import Breadcrumb from '../../components/Breadcrumb/Breadcrumb';
import Footer from '../../components/Footer/Footer';
import Dashboard from '../../views/Dashboard/';
import InformationRepository from '../../repositories/InformationRepository';
import ConfirmationModal from "../../components/ConfirmationModal/ConfirmationModal";
import MessageBox from "../../components/MessageBox/MessageBox";

import MeEdit from "../../views/Me/MeEdit";

import AdminUserIndex from '../../views/AdminUsers/AdminUserIndex';
import AdminUserShow from '../../views/AdminUsers/AdminUserShow';
import AdminUserEdit from "../../views/AdminUsers/AdminUserEdit";

import UserIndex from '../../views/Users/UserIndex';
import UserShow from '../../views/Users/UserShow';
import UserEdit from "../../views/Users/UserEdit";
import AuthService from "../../services/AuthService";
import FileIndex from '../../views/Files/FileIndex';
import FileShow from '../../views/Files/FileShow';
import FileEdit from "../../views/Files/FileEdit";
import AdminUserRoleIndex from '../../views/AdminUserRoles/AdminUserRoleIndex';
import AdminUserRoleShow from '../../views/AdminUserRoles/AdminUserRoleShow';
import AdminUserRoleEdit from "../../views/AdminUserRoles/AdminUserRoleEdit";
import AdminUserNotificationIndex from '../../views/AdminUserNotifications/AdminUserNotificationIndex';
import AdminUserNotificationShow from '../../views/AdminUserNotifications/AdminUserNotificationShow';
import AdminUserNotificationEdit from "../../views/AdminUserNotifications/AdminUserNotificationEdit";
import UserServiceAuthenticationIndex from '../../views/UserServiceAuthentications/UserServiceAuthenticationIndex';
import UserServiceAuthenticationShow from '../../views/UserServiceAuthentications/UserServiceAuthenticationShow';
import UserServiceAuthenticationEdit from "../../views/UserServiceAuthentications/UserServiceAuthenticationEdit";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      params: {
        information: {
          authUser: null,
          notifications: [],
          notificationCount: 0,
        },
        confirmation: {
          isOpen: false,
          message: "",
          onOKCallback: null,
          onCancelCallback: null,
        },
        alert: {
          errorMessage: "",
          successMessage: "",
        }
      },
      methods: {
        getInformation: this.getInformation.bind(this),
        confirmation: this.confirmation.bind(this),
        errorMessage: this.errorMessage.bind(this),
        successMessage: this.successMessage.bind(this),
        signOut: this.signOut.bind(this),
        moveToProfileEdit: this.moveToProfileEdit.bind(this),
      }
    };
    this.handleConfirmationOnOK = this.handleConfirmationOnOK.bind(this);
    this.handleConfirmationOnCancel = this.handleConfirmationOnCancel.bind(this);
    this.handleOnSuccessAlertDismiss = this.handleOnSuccessAlertDismiss.bind(this);
    this.handleOnErrorAlertDismiss = this.handleOnErrorAlertDismiss.bind(this);
    props.history.listen((location, action) => {
      this.handleOnSuccessAlertDismiss();
      this.handleOnErrorAlertDismiss();
    });
  }

  getInformation() {
    let repository = new InformationRepository();
    repository.getInfo().then(repos => {
      this.setState({params: {...this.state.params, information: repos}})
    });
  }

  componentWillMount() {
    this.getInformation();
  }

  handleConfirmationOnOK(e) {
    this.setState({
      params: {
        ...this.state.params,
        confirmation: {
          ...this.state.params.confirmation,
          isOpen: false,
        }
      }
    });
    if (this.state.params.confirmation.onOKCallback) {
      this.state.params.confirmation.onOKCallback(e);
    }
  }

  handleConfirmationOnCancel(e) {
    this.setState({
      params: {
        ...this.state.params,
        confirmation: {
          ...this.state.params.confirmation,
          isOpen: false,
        }
      }
    });
    if (this.state.params.confirmation.onCancelCallback) {
      this.state.params.confirmation.onCancelCallback(e);
    }
  }

  handleOnSuccessAlertDismiss() {
    this.setState({
      params: {
        ...this.state.params,
        alert: {
          ...this.state.params.alert,
          successMessage: "",
        }
      }
    });
  }

  handleOnErrorAlertDismiss() {
    this.setState({
      params: {
        ...this.state.params,
        alert: {
          ...this.state.params.alert,
          errorMessage: "",
        }
      }
    });
  }

  successMessage(message) {
    this.setState({
      params: {
        ...this.state.params,
        alert: {
          ...this.state.params.alert,
          successMessage: message,
        }
      }
    });
  }

  errorMessage(message) {
    this.setState({
      params: {
        ...this.state.params,
        alert: {
          ...this.state.params.alert,
          errorMessage: message,
        }
      }
    });
  }

  signOut()
  {
    AuthService.signOut().then(repos => {
      window.location = '/admin'
    }).catch(error => {
      this.props.methods.errorMessage('Sign out failed. Please access again later');
    });
  }

  moveToProfileEdit()
  {
    this.props.history.push('/me');
  }

  // Event Handlers
  confirmation(title, message, onOKCallback, onCancelCallback) {
    this.setState({
      params: {
        ...this.state.params,
        confirmation: {
          ...this.state.params.confirmation,
          title: title,
          message: message,
          isOpen: true,
          onOKCallback: onOKCallback,
          onCancelCallback: onCancelCallback,
        },
      }
    });
  }

  render() {
    return (
      <div className="app">
        <ConfirmationModal
          isOpen={this.state.params.confirmation.isOpen}
          message={this.state.params.confirmation.message}
          onOk={this.handleConfirmationOnOK}
          onCancel={this.handleConfirmationOnCancel}
        />
        <Header params={this.state.params} methods={this.state.methods} {...this.props}/>
        <div className="app-body">
          <Sidebar params={this.state.params} methods={this.state.methods} {...this.props}/>
          <main className="main">
            <div>
              <Breadcrumb/>
              <Container fluid>
                <MessageBox
                  onDismissError={this.handleOnSuccessAlertDismiss}
                  onDismissSuccess={this.handleOnSuccessAlertDismiss}
                  errorMessage={this.state.params.alert.errorMessage}
                  successMessage={this.state.params.alert.successMessage}/>
                <Switch>
                  <PropsRoute path="/dashboard" name="Dashboard" component={Dashboard} {...this.state}/>
                  <PropsRoute path="/me" name="Edit Profile" component={MeEdit} {...this.state}/>
                  <PropsRoute path="/admin-users/:id/edit" name="Admin Users Edit" component={AdminUserEdit} {...this.state}/>
                  <PropsRoute path="/admin-users/create" name="Admin Users Create" component={AdminUserEdit} {...this.state}/>
                  <PropsRoute path="/admin-users/:id" name="Admin Users Show" component={AdminUserShow} {...this.state}/>
                  <PropsRoute path="/admin-users" name="Admin Users" component={AdminUserIndex} {...this.state}/>
                  <PropsRoute path="/users/:id/edit" name="Users Edit" component={UserEdit} {...this.state}/>
                  <PropsRoute path="/users/create" name="Users Create" component={UserEdit} {...this.state}/>
                  <PropsRoute path="/users/:id" name="Users Show" component={UserShow} {...this.state}/>
                  <PropsRoute path="/users" name="Users" component={UserIndex} {...this.state}/>
                  <PropsRoute path="/files/:id/edit" name="Files Edit" component={FileEdit} {...this.state}/>
                  <PropsRoute path="/files/create" name="Files Create" component={FileEdit} {...this.state}/>
                  <PropsRoute path="/files/:id" name="Files Show" component={FileShow} {...this.state}/>
                  <PropsRoute path="/files" name="Files" component={FileIndex} {...this.state}/>
                  <PropsRoute path="/admin_user_roles/:id/edit" name="Admin User Roles Edit" component={AdminUserRoleEdit} {...this.state}/>
                  <PropsRoute path="/admin_user_roles/create" name="Admin User Roles Create" component={AdminUserRoleEdit} {...this.state}/>
                  <PropsRoute path="/admin_user_roles/:id" name="Admin User Roles Show" component={AdminUserRoleShow} {...this.state}/>
                  <PropsRoute path="/admin_user_roles" name="Admin User Roles" component={AdminUserRoleIndex} {...this.state}/>
                  <PropsRoute path="/admin_user_notifications/:id/edit" name="Admin User Notifications Edit" component={AdminUserNotificationEdit} {...this.state}/>
                  <PropsRoute path="/admin_user_notifications/create" name="Admin User Notifications Create" component={AdminUserNotificationEdit} {...this.state}/>
                  <PropsRoute path="/admin_user_notifications/:id" name="Admin User Notifications Show" component={AdminUserNotificationShow} {...this.state}/>
                  <PropsRoute path="/admin_user_notifications" name="Admin User Notifications" component={AdminUserNotificationIndex} {...this.state}/>
                  <PropsRoute path="/user_service_authentications/:id/edit" name="User Service Authentications Edit" component={UserServiceAuthenticationEdit} {...this.state}/>
                  <PropsRoute path="/user_service_authentications/create" name="User Service Authentications Create" component={UserServiceAuthenticationEdit} {...this.state}/>
                  <PropsRoute path="/user_service_authentications/:id" name="User Service Authentications Show" component={UserServiceAuthenticationShow} {...this.state}/>
                  <PropsRoute path="/user_service_authentications" name="User Service Authentications" component={UserServiceAuthenticationIndex} {...this.state}/>
                  <Redirect from="/" to="/dashboard"/>
                </Switch>
              </Container>
            </div>
          </main>
        </div>
        <Footer/>
      </div>
    );
  }
}

export default App;
