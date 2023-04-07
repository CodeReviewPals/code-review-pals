import GuestLayout from '@/Layouts/GuestLayout';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head } from '@inertiajs/react';

import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faGithub } from '@fortawesome/free-brands-svg-icons'

export default function Login() {
    return (
        <GuestLayout>
            <Head title="Log in" />

            <div className="mt-1 text-xl font-semibold text-gray-900 dark:text-white">
                Please log in with GitHub
            </div>


            <p className="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed text-justify">
                By logging in with GitHub, you can easily access your own code and request reviews from other developers. You can also browse and join existing review requests from other users.
            </p>


            <div className="flex items-center justify-center mt-4">
                <PrimaryButton className="flex items-center">
                    <FontAwesomeIcon icon={faGithub} size="2x" className="mr-2" />
                    <a href={route('socialite.redirect', 'github')}>
                        Login with Github
                    </a>
                </PrimaryButton>
            </div>

        </GuestLayout>
    );
}
