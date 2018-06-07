import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PaidPackagesComponent } from './paid-packages.component';

describe('PaidPackagesComponent', () => {
  let component: PaidPackagesComponent;
  let fixture: ComponentFixture<PaidPackagesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PaidPackagesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PaidPackagesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
