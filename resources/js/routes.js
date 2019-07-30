import NotFound from "./components/NotFound";
import Home from './components/Home';
import Employees from './components/Employees';
import EmployeesEmploymentProfile from "./components/EmployeesEmploymentProfile";

export default {
    mode: 'history',
    routes: [
       {
            path: '*',
            component: NotFound
        },
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/employees',
            name: 'employees',
            component: Employees,
        },
       {
            path: '/employee/:id',
            name: 'employeesProfile',
            component: EmployeesEmploymentProfile,
            props: true
        }
    ]
}
