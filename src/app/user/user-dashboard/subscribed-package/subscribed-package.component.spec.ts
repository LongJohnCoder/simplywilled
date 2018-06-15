import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SubscribedPackageComponent } from './subscribed-package.component';

describe('SubscribedPackageComponent', () => {
  let component: SubscribedPackageComponent;
  let fixture: ComponentFixture<SubscribedPackageComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SubscribedPackageComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SubscribedPackageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
