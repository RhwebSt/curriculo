
import {route as auth} from '../modulos/auth'
import { route as home } from "../modulos/home";
import { route as trabalhador } from "../modulos/tercerizada/trabalhador";

export default [
    ...auth,
    ...home,
    ...trabalhador
]