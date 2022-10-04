
import {route as auth} from '../modulos/auth'
import {route as principal} from '@/modulos/home'
import {route as curriculo} from '../modulos/curriculo'
import {route as admin} from '../modulos/admin'

export default [
    ...auth,
    ...principal,
    ...curriculo,
    ...admin,
    

]