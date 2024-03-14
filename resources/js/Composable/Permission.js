import { usePage } from '@inertiajs/vue3';

export function usePermission() {
    const hasRole = (name) =>usePage().props.auth.user.roles.includes(name);
    const hasPermission = (name) => 
        usePage().props.auth.user.permissions.includes(name);
    const hasRoles = (names) => usePage().props.auth.user.roles.some(name => names.includes(name));

    return { hasRole, hasPermission, hasRoles };
}