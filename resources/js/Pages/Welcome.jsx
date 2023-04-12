import { Link, Head } from '@inertiajs/react';
import Logo from '~/images/logo.svg';
import GithubLogo from '~/images/dashboard/github.svg';
import { useState } from 'react';

export default function Welcome({ auth, title }) {
    const returnAuthHeaderBtn = () => {
        if (auth.user) {
            return (
                <Link
                    href={route('dashboard')}
                    className="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
                >
                    Dashboard
                    <svg
                        fill="none"
                        stroke="currentColor"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        className="w-4 h-4 ml-1"
                        viewBox="0 0 24 24"
                    >
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </Link>
            );
        }
        return (
            <a
                href={route('socialite.redirect', 'github')}
                className="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
            >
                <img src={GithubLogo} className="h-7 mr-3 my-1 invert" />
                Login
            </a>
        );
    };

    const stepStepHorizontalSliderData = [
        {
            id: 1,
            title: '',
            description: '',
            src: '',
            active: false,
        },
        {
            id: 2,
            title: '',
            description: '',
            src: '',
            active: false,
        },
    ];
    const [stepStepHorizontalSliderActive, setStepStepHorizontalSliderActive] = useState(1);

    const onClickStepStepHorizontalSlider = (id) => {
        setStepStepHorizontalSliderActive(id);
    };

    return (
        <>
            <Head title={title} />
            <header className="text-gray-600 body-font">
                <div className="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                    <a
                        href={route('home')}
                        className="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"
                    >
                        <img src={Logo} className="h-16 text-white p-2 " />
                    </a>
                    <nav className="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                        {/* <a className="mr-5 hover:text-gray-900">First Link</a>
                        <a className="mr-5 hover:text-gray-900">Second Link</a>
                        <a className="mr-5 hover:text-gray-900">Third Link</a>
                        <a className="mr-5 hover:text-gray-900">Fourth Link</a> */}
                    </nav>
                    {returnAuthHeaderBtn()}
                </div>
            </header>
            <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16 pt-20 text-center lg:pt-32">
                <h1 className="mx-auto max-w-4xl font-display text-5xl font-medium tracking-tight text-slate-900 sm:text-7xl">
                    Tough for{' '}
                    <span className="relative whitespace-nowrap text-blue-600">
                        <svg
                            aria-hidden="true"
                            viewBox="0 0 418 42"
                            className="absolute left-0 top-2/3 h-[0.58em] w-full fill-blue-300/70"
                            preserveAspectRatio="none"
                        >
                            <path d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z"></path>
                        </svg>
                        <span className="relative">Junior Developers</span>
                    </span>{' '}
                    to start journey.
                </h1>
                <p className="mx-auto mt-6 max-w-2xl text-xl tracking-tight text-slate-700">
                    a short description about our goal and service
                </p>
                <div className="mt-10 flex justify-center gap-x-6">
                    <a
                        className="group inline-flex items-center justify-center rounded-full py-2 px-4 text-lg font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 active:bg-slate-800 active:text-slate-300 focus-visible:outline-slate-900"
                        href="/register"
                    >
                        Look around
                    </a>
                    <a
                        className="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-lg focus:outline-none ring-slate-200 text-slate-700 hover:text-slate-900 hover:ring-slate-300 active:bg-slate-100 active:text-slate-600 focus-visible:outline-blue-600 focus-visible:ring-slate-300"
                        href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    >
                        <svg aria-hidden="true" className="h-3 w-3 flex-none fill-blue-600 group-active:fill-current">
                            <path d="m9.997 6.91-7.583 3.447A1 1 0 0 1 1 9.447V2.553a1 1 0 0 1 1.414-.91L9.997 5.09c.782.355.782 1.465 0 1.82Z"></path>
                        </svg>
                        <span className="ml-3">Learn how to start</span>
                    </a>
                </div>
            </div>

            <section
                id="features"
                aria-label="Features for running your books"
                className="relative overflow-hidden bg-blue-600 pb-28 pt-20 sm:py-32"
            >
                <img
                    alt=""
                    loading="lazy"
                    decoding="async"
                    // dataNimg="1"
                    className="absolute left-1/2 top-1/2 max-w-none translate-x-[-44%] translate-y-[-42%]"
                    style={{ color: 'transparent' }}
                    src="/_next/static/media/background-features.5f7a9ac9.jpg"
                    width="2245"
                    height="1636"
                />
                <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
                    <div className="max-w-2xl md:mx-auto md:text-center xl:max-w-none">
                        <h2 className="font-display text-3xl tracking-tight text-white sm:text-4xl md:text-5xl">
                            Everything you need to run your books.
                        </h2>
                        <p className="mt-6 text-lg tracking-tight text-blue-100">
                            Well everything you need if you aren’t that picky about minor details like tax compliance.
                        </p>
                    </div>
                    <div className="mt-16 grid grid-cols-1 items-center gap-y-2 pt-10 sm:gap-y-6 md:mt-20 lg:grid-cols-12 lg:pt-0">
                        <div className="-mx-4 flex overflow-x-auto pb-4 sm:mx-0 sm:overflow-visible sm:pb-0 lg:col-span-5">
                            <div
                                className="relative z-10 flex gap-x-4 whitespace-nowrap px-4 sm:mx-auto sm:px-0 lg:mx-0 lg:block lg:gap-x-0 lg:gap-y-1 lg:whitespace-normal"
                                role="tablist"
                                aria-orientation="vertical"
                            >
                                {stepStepHorizontalSliderData.map((data) => {
                                    const extraClass =
                                        data.id === stepStepHorizontalSliderActive
                                            ? 'bg-white lg:bg-white/10 lg:ring-1 lg:ring-inset lg:ring-white/10'
                                            : 'hover:bg-white/10 lg:hover:bg-white/5';
                                    return (
                                        <div
                                            key={data.id}
                                            className={
                                                'group relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6 ' +
                                                extraClass
                                            }
                                        >
                                            <h3>
                                                <button
                                                    className="font-display text-lg [&amp;:not(:focus-visible)]:focus:outline-none text-blue-600 lg:text-white"
                                                    role="tab"
                                                    type="button"
                                                    data={data.id}
                                                    onClick={() => onClickStepStepHorizontalSlider(data.id)}
                                                >
                                                    <span className="absolute inset-0 rounded-full lg:rounded-l-xl lg:rounded-r-none"></span>
                                                    Payroll
                                                </button>
                                            </h3>
                                            <p className="mt-2 hidden text-sm lg:block text-white">
                                                Keep track of everyone's salaries and whether or not they've been paid.
                                                Direct deposit not supported.
                                            </p>
                                        </div>
                                    );
                                })}
                            </div>
                        </div>
                        <div className="lg:col-span-7">
                            {stepStepHorizontalSliderData.map((data) => {
                                return (
                                    <div
                                        id="headlessui-tabs-panel-:Rda9m:"
                                        role="tabpanel"
                                        style={{
                                            display: data.id === stepStepHorizontalSliderActive ? 'block' : 'none',
                                        }}
                                        data-headlessui-state="selected"
                                        aria-labelledby="headlessui-tabs-tab-:R2ba9m:"
                                    >
                                        <div className="relative sm:px-6 lg:hidden">
                                            <div className="absolute -inset-x-4 bottom-[-4.25rem] top-[-6.5rem] bg-white/10 ring-1 ring-inset ring-white/10 sm:inset-x-0 sm:rounded-t-xl"></div>
                                            <p className="relative mx-auto max-w-2xl text-base text-white sm:text-center">
                                                Keep track of everyone's salaries and whether or not they've been paid.
                                                Direct deposit not supported.
                                            </p>
                                        </div>
                                        <div className="mt-10 w-[45rem] overflow-hidden rounded-xl bg-slate-50 shadow-xl shadow-blue-900/20 sm:w-auto lg:mt-0 lg:w-[67.8125rem]">
                                            <img
                                                alt=""
                                                fetchpriority="high"
                                                decoding="async"
                                                // dataNimg="1"
                                                className="w-full"
                                                style={{ color: 'transparent' }}
                                                sizes="(min-width: 1024px) 67.8125rem, (min-width: 640px) 100vw, 45rem"
                                                srcSet="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=640&amp;q=75 640w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=750&amp;q=75 750w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=828&amp;q=75 828w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=3840&amp;q=75 3840w"
                                                src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fpayroll.517af4e7.png&amp;w=3840&amp;q=75"
                                                width="2174"
                                                height="1464"
                                            />
                                        </div>
                                    </div>
                                );
                            })}
                        </div>
                    </div>
                </div>
            </section>

            <section className="text-gray-600 body-font">
                <div className="container px-5 py-24 mx-auto">
                    <div className="flex flex-col text-center w-full mb-20">
                        <h1 className="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                            Master Cleanse Reliac Heirloom
                        </h1>
                        <p className="lg:w-2/3 mx-auto leading-relaxed text-base">
                            Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke
                            farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies
                            heirloom prism food truck ugh squid celiac humblebrag.
                        </p>
                    </div>
                    <div className="flex flex-wrap -m-4 text-center">
                        <div className="p-4 md:w-1/4 sm:w-1/2 w-full">
                            <div className="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    className="text-blue-600 w-12 h-12 mb-3 inline-block"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M8 17l4 4 4-4m-4-5v9"></path>
                                    <path d="M20.88 18.09A5 5 0 0018 9h-1.26A8 8 0 103 16.29"></path>
                                </svg>
                                <h2 className="title-font font-medium text-3xl text-gray-900">2.7K</h2>
                                <p className="leading-relaxed">Downloads</p>
                            </div>
                        </div>
                        <div className="p-4 md:w-1/4 sm:w-1/2 w-full">
                            <div className="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    className="text-blue-600 w-12 h-12 mb-3 inline-block"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
                                </svg>
                                <h2 className="title-font font-medium text-3xl text-gray-900">1.3K</h2>
                                <p className="leading-relaxed">Users</p>
                            </div>
                        </div>
                        <div className="p-4 md:w-1/4 sm:w-1/2 w-full">
                            <div className="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    className="text-blue-600 w-12 h-12 mb-3 inline-block"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M3 18v-6a9 9 0 0118 0v6"></path>
                                    <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"></path>
                                </svg>
                                <h2 className="title-font font-medium text-3xl text-gray-900">74</h2>
                                <p className="leading-relaxed">Files</p>
                            </div>
                        </div>
                        <div className="p-4 md:w-1/4 sm:w-1/2 w-full">
                            <div className="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    className="text-blue-600 w-12 h-12 mb-3 inline-block"
                                    viewBox="0 0 24 24"
                                >
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                                <h2 className="title-font font-medium text-3xl text-gray-900">46</h2>
                                <p className="leading-relaxed">Places</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}
