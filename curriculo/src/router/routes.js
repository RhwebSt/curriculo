
import {route as auth} from '../modulos/auth'
import {route as home} from '../modulos/home'
import {route as curriculo} from '../modulos/curriculo'
import {route as admin} from '../modulos/admin'

export default [
    ...auth,
    ...home,
    ...curriculo,
    ...admin,
    

]